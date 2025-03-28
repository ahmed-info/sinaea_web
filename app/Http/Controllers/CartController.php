<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CallUs;
use App\Models\Category;
use App\Models\Department;
use App\Models\ExternalCategory;
use App\Models\Order;
use App\Models\Social;
use App\Models\Brand;
use App\Models\Record;
use App\Models\Item;
use App\Models\Slide;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addItemToCart($itemId)
    {
        $result = Cart::where('item_id', $itemId)->where('user_id', auth()->user()->id)->first();
        //return $result;
        if ($result) {
            $result->quantity += 1;
            $result->save();

            return redirect()->route('shopcart');

        } else {
            $cart = new Cart();
            $cart->item_id = $itemId;
            $cart->user_id = auth()->user()->id;
            $cart->quantity = 1;
            $cart->save();
            return redirect()->route('shopcart');
        }

    }

    public function shopcart()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $carts = Cart::where('user_id', $user->id)->get();
            $callUs = CallUs::first();
            $social = Social::first();
            $departments = Department::all();
            $categories = Category::all();
            $brands = Brand::all();
            $externalCategories = ExternalCategory::latest()->get();
            return view('users.shopcart', compact('user', 'callUs', 'categories', 'social', 'departments', 'brands', 'externalCategories', 'carts'));
        } else {
            return redirect()->route('userlogin');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function decreaseCart(Request $request,$id)
    {
        $result = Cart::findOrFail($id);
        if ($result->quantity > 1) {
            $result->quantity -= 1;
            $result->save();

            return redirect()->route('shopcart');
        } else {
            $result->delete();
            return redirect()->route('shopcart');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function increaseCart(Request $request, $id)
    {
       // return $id;
        //return $itemId;
       // return $request->all();
        $result = Cart::findOrFail($id);

        //return $result;
        $result->quantity += 1;
        //return "ok increase";
        $result->save();

        return redirect()->route('shopcart');
    }

    public function deleteCart($id)
    {
        $result = Cart::find($id);
        $result->delete();
        //return "ok delete";
        return redirect()->route('shopcart');
    }
    public function checkoutOrder(Request $request)
    {
        $request->validate([
            'user_id'=> 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
        ],[
            'user_id.required' => 'الرجاء تسجيل الدخول',
            'user_id.exists' => 'الرجاء تسجيل الدخول',
            'address.required' => 'الرجاء ادخال العنوان',
            'address.max' => 'العنوان يجب ان يكون اقل من 255 حرف',
            'notes.max' => 'الملاحظات يجب ان تكون اقل من 255 حرف',
        ]);
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->address = $request->address;
        $order->notes = $request->notes;
        $order->save();


        $arrayPrice = explode(',', $request->price[0]);
        $arrayQuantity = explode(',', $request->quantity[0]);
        $arrayId = explode(',', $request->id[0]);

        for ($i = 0; $i < count($arrayPrice); $i++) {
            Record::create([
                'item_id' => $arrayId[$i],
                'quantity' => $arrayQuantity[$i],
                'price' => $arrayPrice[$i],
                'order_id' => $order->id,

            ]);
        }
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
       session(['status' => 'تم ارسال الطلب بنجاح']);

       $departments = Department::all();
       $slides = Slide::all();
       $categories = Category::all();
       $externalCategories = ExternalCategory::latest()->get();
       $newitems = Item::latest()->limit(6)->get();
       $callUs = CallUs::first();
       $social = Social::first();

       $brands = Brand::all();
       return view('main.home', compact('departments', 'categories', 'slides', 'externalCategories', 'newitems', 'callUs', 'social', 'brands'));
    }





}
