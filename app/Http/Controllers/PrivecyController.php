<?php

namespace App\Http\Controllers;

use App\Models\Privecy;
use Illuminate\Http\Request;

class PrivecyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privecy = Privecy::first();
        return view('privacy.index', compact('privecy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(Privecy $privecy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $privacy = Privecy::first();
        return view('privacy.edit', compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate( [
            "privacy_policy" => "nullable",
            "terms_and_conditions" => "nullable",
        ]);
        $privacy = Privecy::first();
        $privacy->update($request->all());
        session(['status'=> 'تم تحديث المعلومات بنجاح']);
        return redirect()->route('privacy.edit');
    }


}
