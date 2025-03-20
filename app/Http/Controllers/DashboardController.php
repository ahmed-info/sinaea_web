<?php

namespace App\Http\Controllers;

use App\Models\Dollar;
use App\Models\ExternalCategory;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Item;
use App\Models\Department;
use App\Models\Category;
use App\Models\Slide;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $departments = Department::count();  // get all departments
        $categories = Category::count();  // get all categories
        $products = Item::count();
        $brands = Brand::count();
        $newProducts  = Item::latest()->take(5)->get();
        $exchagePrice = Dollar::first();
        $externalCategories = ExternalCategory::count();
        $slides = Slide::count();

        $orderSent = Order::where("status","تم الارسال")->count();
        $orderDelivered = Order::where("status","تم التوصيل")->count();
        $orderCanceled = Order::where("status","تم الالغاء")->count();
        $orderProcessed = Order::where("status","تم التجهيز")->count();
        //echo $orderSent;
        //echo $orderDelivered;
       // echo $orderCanceled;
       // echo $orderProcessed;
//return "";
        return view('dashboard', compact(
            'departments','categories',
             'products','newProducts','brands',
             'exchagePrice','externalCategories',
             'slides','orderSent','orderDelivered',
             'orderCanceled','orderProcessed'));
    }

    public function userdashboard()
    {
        return "my use dashboard";
        return view('users.userdashboard');
    }


}
