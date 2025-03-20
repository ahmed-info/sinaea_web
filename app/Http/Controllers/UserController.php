<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("users.index",compact("users"));
    }

    public function edit(User $user){
        return view("users.edit", compact("user"));
    }

    public function update(Request $request,User $user){
        $request->validate([
            "name"=> "required",
            "isSupplier"=> "required|boolean",
        ]);
        $user->update($request->all());
        return redirect()->route("users.index");
    }
    public function show(User $user){
        return view("users.show",compact("user"));
    }

    public function userlogin(Request $request){
        
      }

}
