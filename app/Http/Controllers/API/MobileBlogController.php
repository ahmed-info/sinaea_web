<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobileBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
    }
    public function index()
    {
        $blogs=Blog::all();
        return response()->json($blogs);
    }


    public function store(Request $request,$id)
    {
        $blog=Blog::find($id);
        if(!$blog){
            return response()->json([
                'success'=> false,
                'message'=> 'المدونة غير موجودة'
                ],404);
        }
        $validator=Validator::make($request->all(),[
            'comment'=>'required|string',
        ],[
            'comment.required'=>'التعليق مطلوب',
            'comment.string'=>'التعليق يجب ان يكون نص',
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

        $blog->comments()->create([
            'user_id'=>auth()->user()->id,
            'comment'=>$request->comment,
        ]);
        return response()->json([
            'success'=> true,
            'message'=> 'تم اضافة التعليق بنجاح'
            ],200);




    }


    public function show($id)
    {
        $blog=Blog::where('id',$id)
        ->first();
        if(!$blog){
            return response()->json([
                'success'=> false,
                'message'=> 'المدونة غير موجودة'
                ],422);
        }
        return response()->json($blog);
    }

    public function update(Request $request,$id)
    {

        $comment=Comment::find($id);
        if(!$comment){
            return response()->json([
                'success'=> false,
                'message'=> 'التعليق غير موجود'
                ],422);
        }
        $validator=Validator::make($request->all(),[
            'comment'=>'required|string',
        ],[
            'comment.required'=>'التعليق مطلوب',
            'comment.string'=>'التعليق يجب ان يكون نص',
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


        $comment->update([
            'comment'=>$request->comment,
        ]);
        return response()->json([
            'success'=> true,
            'message'=> 'تم تعديل التعليق بنجاح'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        if(!$comment){
            return response()->json([
                'success'=> false,
                'message'=> 'التعليق غير موجود'
                ],422);
        }
        $comment->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'تم حذف التعليق بنجاح'
            ],200);
    }
}
