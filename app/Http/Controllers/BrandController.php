<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view("brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("brands.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $errors = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        // ]);

        // if ($errors->fails()) {
        //     return redirect()->back()->withErrors($errors)->withInput();
        // }

        $request->validate(
            [
            'name' => 'required|string|max:50',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            ['title.required' => 'الرجاء ادخال اسم العلامة التجارية',
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            'image.required' => 'الرجاء اختيار صورة',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا'
            ]
        );

        $brand = new Brand();
        $brand->name = $request->name;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/brand", $filename);
            $brand->image = 'brand' . '/' . $filename;
        }

        $brand->save();
        session(['status'=> 'تم اضافة الماركة بنجاح']);
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate(
            [
            'name' => 'required|string|max:50',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
            'name.required' => 'الرجاء ادخال اسم العلامة التجارية',
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            'image.required' => 'الرجاء اختيار صورة',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا'
            ]
        );
        $brand->name = $request->name;
        if ($request->file('image')) {
            $destination = 'images/' . $brand->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);

            $imagepath = $image->move("images/brand", $filename); //move to file
            $brand->image = 'brand' . '/' . $filename;
        }
        $brand->update();
        session(['status'=> 'تم تعديل الماركة بنجاح']);

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        
        $destination = 'images/' . $brand->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $brand->delete();
        session(['status'=> 'تم حذف العلامة التجارية بنجاح']);
        return redirect()->route('brands.index');
    }
}
