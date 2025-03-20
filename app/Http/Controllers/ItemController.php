<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dollar;
use App\Models\Item;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view("items.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $dollars = Dollar::all();
        return view("items.create", compact("brands", "categories", 'dollars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'cost_price' => 'required|numeric',
            'user_price' => 'required|numeric',
            'supplier_price' => 'required|numeric',
            'isDollar' => 'nullable|boolean',
            'discount' => 'nullable|numeric|between:0,100',
            'active' => 'nullable|boolean',
            'available' => 'nullable|boolean',
        ], [
            'name.required' => 'الرجاء ادخال اسم العلامة التجارية',
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            'image.required' => 'الرجاء اختيار صورة',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا',
            'category_id.required' => 'الرجاء اختيار القسم',
            'category_id.exists' => 'القسم غير موجود',
            'brand_id.exists' => 'العلامة التجارية غير موجودة',
            'brand_id.required'=> 'الرجاء اختيار العلامة التجارية',
            'cost_price.required' => 'الرجاء ادخال سعر التكلفة',
            'cost_price.numeric' => 'سعر التكلفة يجب ان يكون رقم',
            'user_price.required' => 'الرجاء ادخال سعر البيع',
            'user_price.numeric' => 'سعر البيع يجب ان يكون رقم',
            'supplier_price.required' => 'الرجاء ادخال سعر المورد',
            'supplier_price.numeric' => 'سعر المورد يجب ان يكون رقم',
            'isDollar.required' => 'الرجاء اختيار نوع العملة',
            'isDollar.boolean' => 'نوع العملة يجب ان يكون رقم',
            'discount.numeric' => 'الخصم يجب ان يكون رقم',
            'discount.between' => 'الخصم يجب ان يكون بين 0 و 100',
            'active.boolean' => 'الحالة يجب ان تكون رقم',
            'available.nullable' => 'الرجاء اختيار الحالة',
            'available.boolean' => 'الحالة يجب ان تكون رقم',

        ]);
        $item = new Item();
        $item->name = $request->name;
        if ($request->file('image')) {
            $destination = 'images/' . $item->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);

            $imagepath = $image->move("images/item", $filename); //move to file
            $item->image = 'item' . '/' . $filename;
        }
        $item->category_id = $request->category_id;
        $item->brand_id = $request->brand_id;
        $item->cost_price = $request->cost_price;
        $item->user_price = $request->user_price;
        $item->supplier_price = $request->supplier_price;
        $item->isDollar = $request->has('isDollar') ? 1 : 0;
        $item->available = $request->has('available') ? 1 : 0;
        $item->active = $request->has('active') ? 1 : 0;
        $item->discount = $request->discount;
        $item->save();
        session(['status' => "تم اضافة المنتج بنجاح"]);
        return redirect()->route('items.index');

    }
    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $dollars = Dollar::all();
        return view("items.edit", compact("item", 'brands', 'categories', 'dollars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            "name" => "required|string|max:50",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category_id" => "required|exists:categories,id",
            "cost_price" => "required|numeric",
            "user_price" => "required|numeric",
            "supplier_price" => "required|numeric",
            "isDollar" => "nullable|boolean",
            "discount" => "nullable|numeric|between:0,100",
            "active" => "nullable|boolean",
            "available" => "nullable|boolean",
        ], [
            "name.required" => "الرجاء ادخال اسم العلامة التجارية",
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            "image.image" => "الرجاء اختيار صورة من نوع png,jpg,jpeg,webp",
            "image.mimes" => "الرجاء اختيار صورة من نوع png,jpg,jpeg,webp",
            "image.max" => "الصورة يجب ان تكون اقل من 2 ميجا",
            "category_id.required" => "الرجاء اختيار القسم",
            "category_id.exists" => "القسم غير موجود",
            "cost_price.required" => "الرجاء ادخال سعر التكلفة",
            "cost_price.numeric" => "سعر التكلفة يجب ان يكون رقم",
            "user_price.required" => "الرجاء ادخال سعر البيع",
            "user_price.numeric" => "سعر البيع يجب ان يكون رقم",
            "supplier_price.required" => "الرجاء ادخال سعر المورد",
            "supplier_price.numeric" => "سعر المورد يجب ان يكون رقم",
            "isDollar.required" => "الرجاء اختيار نوع العملة",
            "isDollar.boolean" => "نوع العملة يجب ان يكون رقم",
            "discount.numeric" => "الخصم يجب ان يكون رقم",
            "active.boolean" => "الحالة يجب ان تكون رقم",
            "available.boolean" => "الحالة يجب ان تكون رقم",
        ]);
        $item->name = $request->name;

        if ($request->hasFile('image')) {
            $destination = 'images/' . $item->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/item", $filename);
            $item->image = 'item' . '/' . $filename;
        }
        $item->category_id = $request->category_id;
        $item->brand_id = $request->brand_id;
        $item->cost_price = $request->cost_price;
        $item->supplier_price = $request->supplier_price;
        $item->user_price = $request->user_price;
        $item->discount = $request->discount;

        $item->isDollar = $request->has('isDollar') ? 1 : 0;
        $item->available = $request->has('available') ? 1 : 0;
        $item->active = $request->has('active') ? 1 : 0;
        $item->update();
        session(['status' => "تم تعديل المنتج بنجاح"]);
        return redirect()->route("items.index");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try {
            $destination = 'images/' . $item->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $item->delete();
            session(['status' => 'تم حذف المنتج بنجاح']);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'لا يمكن حذف المنتج');
        }

    }
}
