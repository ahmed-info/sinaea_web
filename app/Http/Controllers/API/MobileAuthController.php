<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobileAuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except(['store','login','check_phone','check_phone_exist','updateForgetPassword']);
    }
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'phone' => [
                'required',
                'regex:/^(078|077|075|079)[0-9]{8}$/',
            ],
            'password'=>'required|string'
        ],[
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.regex'=>'رقم الهاتف غير صحيح',
            'password.required'=>'كلمة المرور مطلوبة',
            'password.string'=>'كلمة المرور يجب ان تكون نص'
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
        $user = User::where('phone', $request->phone)->first();

        if(!$user){
            return response()->json([
                'success'=> false,
                'message'=> 'رقم الهاتف او كلمة المرور غير صحيحة'
                ],422);
            }
        if($user->active==0){
            return response()->json([
                'success'=> false,
                'message'=> 'الحساب غير مفعل يرجى الاتصال بالادارة'
                ],422);
            }

        if($user->isDeleted==1){
            return response()->json([
                'success'=> false,
                'message'=> 'الحساب محذوف'
                ],422);
        }
        if(Hash::check($request->password,$user->password)){
            $user->device_token = $request->device_token;
            $user->save();
            $user->tokens()->delete();
            $token=$user->createToken('user_token')->plainTextToken;
            $user->token= $token;
            return response()->json($user,200);
        }else{
            return response()->json([
                'success'=> false,
                'message'=> 'رقم الهاتف او كلمة المرور غير صحيحة'
                ],422);
            }
    }


    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:60|min:3',
            'phone' => [
                'required',
                'regex:/^(078|077|075|079)[0-9]{8}$/'
            ],
            'password'=>'required|string|min:6',
            'device_token'=>'nullable|string',
            'email'=>'nullable|email|unique:users,email',
        ],[
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم يجب ان يكون نص',
            'name.max'=>'الاسم يجب ان لا يتجاوز 60 حرف',
            'name.min'=>'الاسم يجب ان لا يقل عن 3 حروف',
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.regex'=>'رقم الهاتف غير صحيح',
            'phone.unique'=>'رقم الهاتف مستخدم من قبل',
            'password.required'=>'كلمة المرور مطلوبة',
            'password.string'=>'كلمة المرور يجب ان تكون نص',
            'password.min'=>'كلمة المرور يجب ان لا تقل عن 6 حروف',
            'device_token.string'=>'device token يجب ان يكون نص',
            'email.email'=>'البريد الالكتروني غير صحيح',
            'email.unique'=>'البريد الالكتروني مستخدم من قبل',
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
        $user = new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->password=$request->password;
        $user->device_token=$request->device_token;
        $user->email=$request->email;
        $user->save();

        $token=$user->createToken('user_token')->plainTextToken;
        $user->token= $token;
        return response()->json($user,200);
    }


    public function changePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'old_password'=>'required|string',
            'new_password'=>'required|string|min:6',
            'confirm_password'=>'required|string|same:new_password',
        ],[
            'old_password.required'=>'كلمة المرور القديمة مطلوبة',
            'new_password.required'=>'كلمة المرور الجديدة مطلوبة',
            'new_password.min'=>'كلمة المرور يجب ان لا تقل عن 6 حروف',
            'confirm_password.required'=>'تأكيد كلمة المرور مطلوب',
            'confirm_password.same'=>'كلمة المرور غير متطابقة',
            'confirm_password.string'=>'كلمة المرور يجب ان تكون نص',
            'new_password.string'=>'كلمة المرور يجب ان تكون نص',
            'old_password.string'=>'كلمة المرور يجب ان تكون نص',
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

        $user=User::find(auth()->user()->id);

        if(Hash::check($request->old_password,$user->password)){
            $user->password=$request->new_password;
            $user->save();
            $user->tokens()->delete();
            $token=$user->createToken('user_token')->plainTextToken;
            return response()->json([
                'success'=> true,
                'token'=> $token,
            ],200);
        }else{
            return response()->json([
                'success'=> false,
                'message'=> 'كلمة المرور القديمة غير صحيحة'
                ],422);
        }
    }

    public function update(Request $request)
    {
        $id=auth()->user()->id;

        $validator=Validator::make($request->all(),[
            "name"=>'required|string|max:60',
            'email'=>'nullable|email|unique:users,email,'.$id,
        ],[
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم يجب ان يكون نص',
            'name.max'=>'الاسم يجب ان لا يزيد عن 60 حرف',
            'email.email'=>'البريد الالكتروني غير صحيح',
            'email.unique'=>'البريد الالكتروني مستخدم من قبل',


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

        $user=User::find($id);
        if($user){
            $user->name=$request->name;
            $user->email=$request->email;
            $user->save();
            return response()->json($user);
    }
    }

    public function destroy()
    {
        $id=auth()->user()->id;
        $user=User::find($id);
        if(!$user){
            return response()->json([
                'success'=> false,
                'message'=> 'المستخدم غير موجود'
                ],422);
        }
        if($user->isDeleted==1){
            return response()->json([
                'success'=> false,
                'message'=> 'الحساب محذوف'
                ],401);
        }


        $user->isDeleted=true;
        $user->save();
        $user->tokens()->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'تم حذف الحساب بنجاح'
            ],200);

    }

    public function check_phone(Request $request){
        $validator=Validator::make($request->all(),[
            'phone'=>'required|digits:11|exists:users,phone',
        ],[
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.digits'=>'رقم الهاتف يجب ان يتكون من 11 رقم',
            'phone.exists'=>'رقم الهاتف موجود سابقا يرجى اختيار رقم هاتف اخر',
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

        // $otpController=new OtpController();
        // $otpRequest=new Request([
        //     'phone'=>$request->phone
        // ]);
        // $otpController->sendCode($otpRequest);
        return response()->json(['message'=>'تم ارسال رمز التحقق الى رقم الهاتف']);
    }


    public function check_phone_exist(Request $request){
        $validator=Validator::make($request->all(),[
            'phone'=>'required|digits:11',
        ],[
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.digits'=>'رقم الهاتف يجب ان يتكون من 11 رقم',
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
        $user=User::where('phone',$request->phone)->first();
        if($user){
            return response()->json([
                'message'=>'رقم الهاتف موجود مسبقا يرجى التسجيل برقم اخر'
            ],422);
        }

        // $otpController=new OtpController();
        // $otpRequest=new Request([
        //     'phone'=>$request->phone
        // ]);
        // $otpController->sendCode($otpRequest);
        return response()->json(['message'=>'تم ارسال رمز التحقق الى رقم الهاتف']);
    }

    public function updateForgetPassword(Request $request){
        $validator=Validator::make($request->all(),[
            'phone'=>'required|digits:11|exists:users,phone',
            'password'=>'required|min:6',
        ],[
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.digits'=>'رقم الهاتف يجب ان يتكون من 11 رقم',
            'phone.exists'=>'رقم الهاتف غير موجود',
            'password.required'=>'كلمة المرور مطلوبة',
            'password.min'=>'كلمة المرور يجب ان لا تقل عن 6 حروف',
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

            $user=User::where('phone',$request->phone)->first();
            $user->password=$request->password;
            $user->save();
            $user->tokens()->delete();
            return response()->json(['message'=>'تم تغيير كلمة المرور بنجاح']);

    }
}
