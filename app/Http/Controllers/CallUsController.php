<?php

namespace App\Http\Controllers;

use App\Models\CallUs;
use Illuminate\Http\Request;

class CallUsController extends Controller
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
    public function show(CallUs $callUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $callUs = CallUs::first();
        return view("callus.edit", compact("callUs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //return $request->all();
        $request->validate([
            "name"=> "nullable",
            "phone"=> "nullable|numeric",
            "email"=> "nullable|email",
            "address"=> "nullable|string",
            "open_time"=> "nullable|date_format:H:i",
            "close_time"=> "nullable|date_format:H:i",
            "latitude"=> "nullable",
            "longitude"=> "nullable",
        ],[
            "phone.numeric" => "الرجاء ادخال رقم هاتف صحيح",
            "email.email" => "الرجاء ادخال بريد الكتروني صحيح",
            "address.string" => "الرجاء ادخال عنوان صحيح",
            "open_time.time" => "الرجاء ادخال وقت صحيح",
            "close_time.time" => "الرجاء ادخال وقت صحيح",

        ]);
        $callUs = CallUs::first();
        $callUs->name = $request->name;
        $callUs->phone = $request->phone;
        $callUs->email = $request->email;
        $callUs->address = $request->address;
        $callUs->open_time = $request->open_time;
        $callUs->close_time = $request->close_time;
        $callUs->latitude = $request->latitude;
        $callUs->longitude = $request->longitude;
        $callUs->update();
        session(["status", "تم تحديث بيانات الاتصال بنجاح"]);

        return redirect()->route("call-us.edit");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CallUs $callUs)
    {
        //
    }
}
