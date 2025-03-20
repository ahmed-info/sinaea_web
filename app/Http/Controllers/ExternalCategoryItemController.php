<?php

namespace App\Http\Controllers;

use App\Models\ExternalCategory;
use App\Models\ExternalCategoryItem;
use App\Models\Item;
use Illuminate\Http\Request;

class ExternalCategoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exterItems = ExternalCategoryItem::orderBy("id","desc")->paginate(10);
        return view('external-category-items.index', compact('exterItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $externalCategories = ExternalCategory::all();
        $items = Item::all();

        return view('external-category-items.create', compact('items','externalCategories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // return response($request->all());
        $request->validate([
            'external_category_id' => 'required|exists:external_categories,id',
            'item_id' => 'required|exists:items,id',
        ]);
       // return $request->all();

        ExternalCategoryItem::create($request->all());
        session(['status' => 'تم إضافة العنصر بنجاح']);
        return redirect()->route('external-categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(ExternalCategoryItem $externalCategoryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExternalCategoryItem $externalCategoryItem)
    {
        $exterCategories = ExternalCategory::all();
        $items = Item::all();
        return view('external-category-items.edit', compact('items','exterCategories','externalCategoryItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExternalCategoryItem $externalCategoryItem)
    {
       // return $request->all();
        $request->validate([
            'external_category_id' => 'required|exists:external_categories,id',
            'item_id' => 'required|exists:items,id',
        ]);
        $externalCategoryItem->item_id = $request->item_id;
        $externalCategoryItem->external_category_id = $request->external_category_id;
        $externalCategoryItem->update();
        session(['status'=> 'تم تعديل العنصر بنجاح']);
        return redirect()->route('external-category-items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExternalCategoryItem $externalCategoryItem)
    {
        $externalCategoryItem->delete();
        session(['status'=> 'تم حذف العنصر بنجاح']);
        return redirect()->route('external-category-items.index');
    }
}
