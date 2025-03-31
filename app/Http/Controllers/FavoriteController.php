<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\CallUs;
use App\Models\Social;
use App\Models\Department;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ExternalCategory;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function favorite()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $favorites = Favorite::where('user_id', $user->id)->get();
            $callUs = CallUs::first();
            $social = Social::first();
            $departments = Department::all();
            $categories = Category::all();
            $brands = Brand::all();
            $externalCategories = ExternalCategory::latest()->get();
            return view('users.favorite', compact('user', 'callUs', 'categories', 'social', 'departments', 'brands', 'externalCategories', 'favorites'));
        } else {
            return redirect()->route('userlogin');
        }
    }

    public function addItemToFav($itemId)
    {
        $result = Favorite::where('item_id', $itemId)->where('user_id', auth()->user()->id)->first();
        //return $result;
        if ($result) {

        } else {
            $favorite = new Favorite();
            $favorite->item_id = $itemId;
            $favorite->user_id = auth()->user()->id;
            $favorite->save();
            return redirect()->route('favorite');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteFav($id)
    {
        $result = Favorite::find($id);
        $result->delete();
        //return "ok delete";
        return redirect()->route('favorite');
    }
}
