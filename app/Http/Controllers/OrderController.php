<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy("created_at","desc")->paginate(10);
        return view("orders.index", compact("orders"));
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
    public function show(Order $order)
    {
        return view("orders.show", compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view("orders.edit", compact("order"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', Rule::in(['تم الارسال', 'تم التجهيز', 'تم التوصيل', 'تم الالغاء'])],
        ]);


        $order->status = $request->status;
        $order->update();
        $user = User::find($order->user_id);
        $user->isSupplier = $request->isSupplier == "1" ? 1:0;
        $user->update();
        session(['status'=> 'تم تحديث حالة الطلب بنجاح']);
        return redirect()->route("orders.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        session(["status"=> "تم حذف الطلب بنجاح"]);
        return redirect()->route("orders.index");
    }
}
