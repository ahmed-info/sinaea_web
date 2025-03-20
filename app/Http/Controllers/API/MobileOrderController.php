<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobileOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index()
    {
        $orders=Order::where('user_id',auth()->user()->id)
        ->orderBy('completed','asc')
        ->orderBy('created_at','desc')
        ->get();

        return response()->json([
            'success'=> true,
            'orders'=> $orders
        ]);
    }


    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'address'=>'required|string',
            'notes'=>'nullable|string',
            'items'=>'required|array',
            'items.*.item_id'=>'required|exists:items,id',
            'items.*.quantity'=>'required|integer|min:1',
        ],[
            'address.required'=>'العنوان مطلوب',
            'address.string'=>'العنوان يجب ان يكون نص',
            'notes.string'=>'ملاحظات يجب ان تكون نص',
            'items.required'=>'المنتجات مطلوبة',
            'items.array'=>'المنتجات يجب ان تكون مصفوفة',
            'items.*.item_id.required'=>'المنتج مطلوب',
            'items.*.item_id.exists'=>'المنتج غير موجود',
            'items.*.quantity.required'=>'الكمية مطلوبة',
            'items.*.quantity.integer'=>'الكمية يجب ان تكون رقم',
            'items.*.quantity.min'=>'الكمية يجب ان تكون اكبر من صفر',

        ]);

        if($validator->fails()){
            $errors='';
            foreach($validator->errors()->all() as $error){
                $errors.=$error.' ';
            }
            return response()->json([
                'success'=> false,
                'message'=> $errors
                ],422);
        }

        $order=Order::create([
            'user_id'=>auth()->user()->id,
            'address'=>$request->address,
            'notes'=>$request->notes,
        ]);

        $user=auth()->user();

        foreach($request->items as $item){
            $itemModel=Item::find($item['item_id']);
            $price = $user->isSupplier
            ? ($itemModel->isDollar ? $itemModel->supplier_price * $itemModel->dollar->value : $itemModel->supplier_price)
            : ($itemModel->isDollar ? $itemModel->user_price * $itemModel->dollar->value : $itemModel->user_price);

            $order->items()->create([
                'item_id'=>$item['item_id'],
                'quantity'=>$item['quantity'],
                'price' => $price,

            ]);
        }

        return response()->json([
            'success'=> true,
            'message'=> 'تم اضافة الطلب بنجاح',
            'order'=> $order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $order=Order::where('user_id',auth()->user()->id)
        ->where('id',$id)
        ->first();
        if($order){
            return response()->json([
                'success'=> true,
                'order'=> $order
            ]);
        }else{
            return response()->json([
                'success'=> false,
                'message'=> 'الطلب غير موجود'
            ],422);
        }
    }


    public function cancelOrder($id)
    {
        $order=Order::where('user_id',auth()->user()->id)
        ->where('id',$id)
        ->first();
        if($order){
            $order->update([
                'canceled'=>true,
                'completed'=>true,
                'status'=>'تم الالغاء'
            ]);
            return response()->json([
                'success'=> true,
                'message'=> 'تم الغاء الطلب'
            ]);
        }else{
            return response()->json([
                'success'=> false,
                'message'=> 'الطلب غير موجود'
            ],422);
        }
    }


}
