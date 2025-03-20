<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view("departments.index", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required|unique:departments|string|max:50',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
             [
                'name.required' => 'الرجاء ادخال اسم العلامة التجارية',
                'name.unique' => 'هذا القسم موجود بالفعل',
             'image.required'=> 'الرجاء اختيار صورة',
            'name.max' => 'اسم القسم الرئيسي يجب ان يكون اقل من 50 حرف',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا'
            ]
        );
        $department = new Department();
        $department->name = $request->name;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/department", $filename);
            $department->image = 'department' . '/' . $filename;
        }
        $department->save();
        return redirect()->route('departments.index')->with('status','تم اضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view("departments.edit", compact("department"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
       // return $request->all();
        //add validation
        $request->validate(
            [
                "name"=> "required|unique:departments,name,".$department->id,
                "image"=> "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
                ],
                [
                    "name.required"=> "الرجاء ادخال اسم القسم",
                    "name.unique"=> "هذا القسم موجود بالفعل",
                    "name.max"=> "اسم القسم يجب ان يكون اقل من 50 حرف",
                    "image.image"=> "الرجاء اختيار صورة من نوع png,jpg,jpeg,webp",
                    "image.mimes"=> "الرجاء اختيار صورة من نوع png,jpg,jpeg,webp",
                    "image.max"=> "الصورة يجب ان تكون اقل من 2 ميجا"
                ]
        );
        $department->name = $request->name;
        if ($request->file('image')) {
            $destination = 'images/' . $department->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);

            $imagepath = $image->move("images/department", $filename); //move to file
            $department->image = 'department' . '/' . $filename;
        }
        $department->update();
        return redirect()->route('departments.index')->with('status','تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $destination = 'images/' . $department->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $department->delete();
        return redirect()->route('departments.index')->with('status', 'تم حذف القسم الرئيسي بنجاح');
    }
}
