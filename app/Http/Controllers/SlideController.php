<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::orderBy("created_at","desc")->paginate(10);
        return view("slides.index", compact("slides"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy("created_at","desc")->paginate(10);
        return view('slides.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:255',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_id'=> 'required|exists:brands,id',
         ],[
            'title.required'=> 'الرجاء ادخال عنوان الصورة',
            'title.max'=> 'عنوان الصورة يجب ان يكون اقل من 50 حرف',
            'description.required'=> 'الرجاء ادخال وصف الصورة',
            'description.max'=> 'وصف الصورة يجب ان يكون اقل من 255 حرف',
            'image.required'=> 'الرجاء اختيار صورة',
            'image.image'=> 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes'=> 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max'=> 'الصورة يجب ان تكون اقل من 2 ميجا',
            'brand_id.required'=> 'الرجاء اختيار العلامة التجارية',
            'brand_id.exists'=> 'العلامة التجارية غير موجودة',
         ]);
         $slide = new Slide;
         $slide->title = $request->title;
         $slide->description = $request->description;

         if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/slide", $filename);
            $slide->image = 'slide' . '/' . $filename;
        }
        $slide->brand_id = $request->brand_id;
        $slide->save();
        session(['status'=> 'تم اضافة السلايد بنجاح']);
        return redirect('slides');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {

        $brands = Brand::all();
        return view('slides.edit', compact('slide', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_id'=> 'required|exists:brands,id',
         ],[
            'title.required'=> 'الرجاء ادخال عنوان السلايد',
            'title.max'=> 'عنوان السلايد يجب ان يكون اقل من 50 حرف',
            'description.required'=> 'الرجاء ادخال وصف الصورة',
            'description.max'=> 'وصف الصورة يجب ان يكون اقل من 255 حرف',
            'image.image'=> 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes'=> 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max'=> 'الصورة يجب ان تكون اقل من 2 ميجا',
            'brand_id.required'=> 'الرجاء اختيار العلامة التجارية',
            'brand_id.exists'=> 'العلامة التجارية غير موجودة',
         ]);
         $slide->title = $request->title;
         $slide->description = $request->description;


         if ($request->file('image')) {
            $destination = 'images/' . $slide->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);

            $imagepath = $image->move("images/slide", $filename); //move to file
            $slide->image = 'slide' . '/' . $filename;
        }
            $slide->brand_id = $request->brand_id;
            $slide->save();
            session(['status'=> 'تم تعديل السلايد بنجاح']);
            return redirect('slides');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        $destination = 'images/' . $slide->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $slide->delete();
        session(['status'=> 'تم حذف السلايد بنجاح']);
        return redirect('slides');
    }
}
