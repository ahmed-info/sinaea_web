<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $social = Social::first();
        return view("socials.edit", compact("social"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate( [
            "facebook" => "nullable|url",
            "whatsapp" => "nullable",
            "instagram" => "nullable|url",
            "telegram" => "nullable",
            "youtube" => "nullable|url",
            "tiktok" => "nullable|url",
        ],[
            "facebook.url" => "الرجاء ادخال رابط صحيح",
            "youtube.url" => "الرجاء ادخال رابط صحيح",
            "instagram.url" => "الرجاء ادخال رابط صحيح",
            "tiktok.url" => "الرجاء ادخال رابط صحيح",
        ]);
        $social = Social::first();
        $social->update($request->all());
        session(['status'=> 'تم تحديث التواصل الاجتماعي بنجاح']);
        return redirect()->route('socials.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        //
    }
}
