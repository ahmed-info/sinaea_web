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
        //$categories = Category::all();
        //$products = Item::with('images')->paginate(1);
        //$brands = Brand::all();
        //$newProducts  = Item::latest()->take(5)->with('images')->get();
        // return $newProducts;
        $departments = Department::all();
        $slides = Slide::all();
        $categories = Category::all();
        $externalCategories = ExternalCategory::latest()->get();
        $newitems = Item::latest()->limit(6)->get();
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

    public function itemsBycategory($categoryId)
    {
        $singleCategory = Category::findOrFail($categoryId);
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
        $category_slug = $request->category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $categories = Category::all();
        $brands = Brand::all();
        $newProducts = item::latest()->take(5)->with('images')->get();

        if ($category) {
            $products = $category->products()->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%")
                ->orWhere('discount', 'like', "%$search%")
                ->with('images')
                ->get();

        } else {
            $products = Item::where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%")
                ->orWhere('discount', 'like', "%$search%")
                ->with('images')
                ->get();
        }

        if ($products->count() == 0) {
            return redirect()->back()->with('status', 'No products found');
        }

        return view('user.searchProduct', compact('categories', 'products', 'brands', 'newProducts'));
    }

    public function sortBy(Request $request)
    {
        $sort = $request->sort;
        $categories = Category::all();
        $brands = Brand::all();
        $newProducts = Item::latest()->take(5)->with('images')->get();
        $products = Item::orderBy($sort, 'ASC')->get();
        return view('user.searchProduct', compact('categories', 'products', 'brands', 'newProducts'));
    }






}
