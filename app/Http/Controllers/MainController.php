<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Department;
use App\Models\ExternalCategory;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Brand;
use App\Models\CallUs;
use App\Models\Social;
class MainController extends Controller
{


    public function home()
    {
    //     $categories = Category::withCount('items')->get();
    //     $items = Category::select('*')
    // ->selectRaw('COUNT(*) as item_count')
    // ->groupBy('name')
    // ->get();
    //     return $items;
        $departments = Department::all();
        $slides = Slide::all();
          //  $categories = Category::withCount('items')->get();
          $categories = Category::select('id', 'name', 'image')
          ->selectRaw('COUNT(name) as category_count')
          ->groupBy('id', 'name', 'image')
          ->get();
        $externalCategories = ExternalCategory::latest()->get();
        $newitems = Item::latest()->limit(8)->get();
        $callUs = CallUs::first();
        $social = Social::first();

        $brands = Brand::all();
        //return $callUs;
        return view('main.home', compact('departments', 'categories', 'slides', 'externalCategories', 'newitems', 'callUs', 'social', 'brands'));
    }

    public function itemsBybrand($brandId)
    {
        $singleBrand = Brand::findOrFail($brandId);
        $items = $singleBrand->items;
        $otherBrands = Brand::where('id', '!=', $brandId)->get();
        $categories = Category::all();
        $brands = Brand::all();
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();
        $externalCategories = ExternalCategory::latest()->get();
        return view('user.productByBrand', compact('categories', 'brands', 'singleBrand', 'otherBrands', 'items', 'callUs', 'social', 'departments', 'externalCategories'));
    }

    public function itemsByCategory($categoryId)
    {
        $singleCategory = Category::findOrFail($categoryId);
        //return $singleCategory;
        $items = $singleCategory->items;
        $otherCategories = Category::where('id', '!=', $categoryId)->get();
        $categories = Category::all();
        $brands = Brand::all();
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();
        $externalCategories = ExternalCategory::latest()->get();
        return view('user.productByCategory', compact('categories', 'brands', 'singleCategory', 'otherCategories', 'items', 'callUs', 'social', 'departments', 'externalCategories'));
    }


    public function itemsByExternal($externalId)
    {
        $singleExternal = ExternalCategory::findOrFail($externalId);
        //$otherCategories = Category::where('id', '!=', $categoryId)->get();
        $categories = Category::all();
        $brands = Brand::all();
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();

        $externalCategories = ExternalCategory::latest()->get();
        return view('user.productByExternalCategory', compact('categories', 'brands', 'singleExternal', 'callUs', 'social', 'departments', 'externalCategories'));
    }

    public function productDetails($id)
    {
        $item = Item::where('id', $id)->firstorFail();
        $relatedItems = Item::where('id', '!=', $id)->latest()->take(6)->get();
        $callUs = CallUs::first();
        $social = Social::first();
        $categories = Category::all();
        $departments = Department::all();
        $brands = Brand::all();
        $externalCategories = ExternalCategory::latest()->get();


       // $user = auth()->user();
            // $cart = Cart::where('user_id', $user->id)->where('item_id', $item->id)->first();
            // if ($cart) {
            //     $cart->quantity += 1;
            //     $cart->save();
            // } else {
            //     $cart = new Cart();
            //     $cart->item_id = $item->id;
            //     $cart->user_id = auth()->user()->id;
            //     $cart->quantity = 1;
            //     $cart->save();
            // }
        return view('user.productDetails', compact('item','relatedItems','callUs', 'social', 'departments','categories','brands','externalCategories'));

    }



    //other methods

    public function show($slug)
    {
        $product = Item::where('slug', $slug)->firstorFail();
        $otherProducts = Item::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('user.productDetails', compact('product', 'categories', 'brands', 'otherProducts'));
    }



    public function filters(Request $request)
    {
        $data = $request->except(['_token']);
        $selectedCategories = array_keys($data);
        $categories = Category::whereIn('slug', $selectedCategories)->with('products.images')->get()->toArray();
        $brands = Brand::whereIn('slug', $selectedCategories)->with('products.images')->get()->toArray();
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $productRange = Item::whereBetween('price', [$min_price, $max_price])->get();

        $res = array_values(array_unique(array_merge($categories, $brands), SORT_REGULAR));
        $results = collect($res);
        foreach ($results as $result) {
            $myresults[] = $result;

        }
        //return $myresults;

        //return $results;
        return view('user.filter', compact('myresults'));
    }

    public function productByCategory($slug)
    {
        $oneCategory = Category::where('slug', $slug)->firstorFail();
        $products = $oneCategory->products;
        $newProducts = Item::latest()->take(5)->get();
        $categories = Category::all();
        $brands = Brand::all();


        return view('user.productByCategory', compact('categories', 'oneCategory', 'products', 'brands', 'newProducts'));
    }

    public function productByBrand($slug)
    {
        $oneBrand = Brand::where('slug', $slug)->firstorFail();
        $products = $oneBrand->products;
        $categories = Category::all();
        $brands = Brand::all();
        $departments = Department::all();
        $externalCategories = ExternalCategory::latest()->get();

        return view('user.productByBrand', compact(
            'categories',
            'oneBrand',
            'products',
            'brands',
            'departments',
            'externalCategories'
        ));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $category_query = $request->category_slug;
        $category = Category::where('name', $category_query)->first();
        $categories = Category::all();
        $brands = Brand::all();
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();
        $externalCategories = ExternalCategory::latest()->get();
        $newProducts = item::latest()->take(5)->get();

        if ($category) {
            $products = $category->items()->where('name', 'like', "%$search%")
            ->get();

        } else {
            $products = Item::where('name', 'like', "%$search%")
                ->get();
        }

        if ($products->count() == 0) {
            return redirect()->back()->with('status', 'No products found');
        }

        return view('user.searchProduct', compact('categories', 'products', 'brands', 'newProducts','callUs','social','departments','externalCategories'));
    }

    public function sortBy($sort = null)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();
        $externalCategories = ExternalCategory::latest()->get();
        if($sort == 'DESC' || $sort == 'ASC') {
            $products = Item::orderBy('created_at', $sort)->get();
            return view('user.sortBy', compact('categories', 'products', 'brands', 'callUs', 'social', 'departments', 'externalCategories'));

        }else if($sort == 'priceASC' || $sort == 'priceDESC') {
            $sort == 'priceASC' ? $sort = 'ASC' : $sort = 'DESC';
            $products = Item::orderBy('user_price', $sort)->get();
            return view('user.sortBy', compact('categories', 'products', 'brands', 'callUs', 'social', 'departments', 'externalCategories'));
        }
        $products = Item::latest()->get();
        return view('user.sortBy', compact('categories', 'products', 'brands', 'callUs', 'social', 'departments', 'externalCategories'));
    }

}
