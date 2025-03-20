<?php

namespace App\Http\Controllers;

use App\Models\Dollar;
use Illuminate\Http\Request;

class DollarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dollars =Dollar::all();
        return view("dollars.index", compact("dollars"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dollars.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric',

        ],[
            'value.required' => 'الحقل مطلوب',
            'value.numeric' => 'يجب ان يكون الحقل رقم',
        ]);
        Dollar::create($request->all());
        return redirect()->route('dollars.index')->with('status','تم اضافة العملة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dollar $dollar)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $dollar = Dollar::first();
        return view('dollars.edit', compact('dollar'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric',

        ],[
            'value.required' => 'الحقل مطلوب',
            'value.numeric' => 'يجب ان يكون الحقل رقم',
        ]);
        $dollar = Dollar::first();
        $dollar->update($request->all());
        return redirect()->route('dollars.edit')->with('status','تم تعديل العملة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dollar $dollar)
    {
        $dollar->delete();
        return redirect()->route('dollars.index')->with('status','تم حذف العملة بنجاح');
    }
}
