<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view("categories.create", compact("departments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
       // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:50',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'department_id'=> 'required|exists:departments,id',
            ],
             ['name.required' => 'الرجاء ادخال اسم العلامة التجارية',
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            'image.required'=> 'الرجاء اختيار صورة',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا',
            'department_id.required' => 'الرجاء اختيار القسم',
            'department_id.exists' => 'القسم غير موجود'
            ]
        );
        $category = new Category();
        $category->name = $request->name;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/category", $filename);
            $category->image = 'category' . '/' . $filename;
        }
        $category->department_id = $request->department_id;
        $category->save();
        return redirect()->route('categories.index')->with('status','تم اضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $departments = Department::all();
        return view("categories.edit",compact("departments","category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
       //return $request->all();
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department_id' => 'required|exists:departments,id',

        ],
        [
            'name.required' => 'الرجاء ادخال اسم العلامة التجارية',
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا',
            'department_id.required' => 'الرجاء اختيار القسم',
            'department_id.exists' => 'القسم غير موجود',
        ]);
        $category->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/category", $filename);
            $category->image = 'category' . '/' . $filename;
        }
        $category->department_id = $request->department_id;
        $category->update();
        return redirect()->route('categories.index')->with('status','تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $destination = 'images/' . $category->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'تم حذف القسم بنجاح');
    }
}
