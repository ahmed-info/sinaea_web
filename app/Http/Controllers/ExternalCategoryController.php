<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ExternalCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExternalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $externalCategories = ExternalCategory::orderBy("created_at","desc")->paginate(10);
        $items = Item::all();
        return view("external-categories.index", compact("externalCategories",'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("external-categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //return $request->all();
        $request->validate([
            "name"=> "required|string",
            "image"=> "required|image:mimes:jpeg,png,jpg,gif,svg|max:2048",
            "discount"=> "nullable|numeric|between:0,100",
        ],[
            "name.required"=> "الرجاء ادخال اسم القسم",
            "name.string"=> "الرجاء ادخال اسم القسم بشكل صحيح",
            "image.image"=> "الرجاء ادخال صورة صالحة",
            "image.mimes"=> "الرجاء ادخال صورة صالحة",
            "image.max"=> "الرجاء ادخال صورة صالحة",
            "image.required"=> "الرجاء ادخال صورة",
            "discount.numeric"=> "الرجاء ادخال الخصم بشكل صحيح",
            "discount.between"=> "الرجاء ادخال الخصم بشكل صحيح",

        ]);
        $externalCategory = new ExternalCategory();
        $externalCategory->name = $request->name;
        $externalCategory->discount = $request->discount;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/externalCategory", $filename);
            $externalCategory->image = 'externalCategory' . '/' . $filename;
        }
        $externalCategory->save();
        session(["status"=> "تم اضافة القسم الخارجي بنجاح"]);
        return redirect()->route("external-categories.index");




    }

    /**
     * Display the specified resource.
     */
    public function show(ExternalCategory $externalCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExternalCategory $externalCategory)
    {
        return view("external-categories.edit", compact("externalCategory"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExternalCategory $externalCategory)
    {
        $request->validate(
            [
            'name' => 'required|string|max:50',
            'discount' => 'nullable|numeric',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
            'name.required' => 'الرجاء ادخال اسم العلامة التجارية',
            'name.max' => 'اسم العلامة التجارية يجب ان يكون اقل من 50 حرف',
            'discount.numeric' => 'الرجاء ادخال الخصم بشكل صحيح',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا'
            ]
        );
        $externalCategory->name = $request->name;
        $externalCategory->discount = $request->discount;
        if ($request->file('image')) {
            $destination = 'images/' . $externalCategory->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);

            $imagepath = $image->move("images/externalCategory", $filename); //move to file
            $externalCategory->image = 'externalCategory' . '/' . $filename;
        }
        $externalCategory->update();
        return redirect()->route('external-categories.index')->with('status','تم تعديل القسم الخارجي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExternalCategory $externalCategory)
    {
        $destination = 'images/' . $externalCategory->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $externalCategory->delete();
        session(["status"=> "تم حذف القسم الخارجي بنجاح"]);
        return redirect()->route('external-categories.index');
    }

    public function createExternalItem(Request $request, $id){
        $externalCategory = ExternalCategory::find($id);
        $items = Item::all();
        return view("external-categories.addExternalItem", compact("externalCategory", "items"));
    }

    public function search(Request $request){
        $search = $request->get('q'); // Search query parameter
        $items = Item::where('name', 'like', "%{$search}%")
                     ->limit(10) // Optional: Limit the number of results
                     ->get();
        return response()->json($items);
    }
}
