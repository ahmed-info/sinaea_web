<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy("created_at","desc")->paginate(10);
        return view("blogs.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            [
            'title.required' => 'الرجاء ادخال عنوان المدونة',
            'content.required' => 'الرجاء ادخال محتوى المدونة',
            'image.required' => 'الرجاء اختيار صورة للمدونة',
            'image.image' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.mimes' => 'الرجاء اختيار صورة من نوع png,jpg,jpeg,webp',
            'image.max' => 'الصورة يجب ان تكون اقل من 2 ميجا',
        ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $image->move("images/blog", $filename);
            $blog->image = 'blog' . '/' . $filename;
        }
        $blog->save();
        session(['status' => 'تم اضافة المدونة بنجاح']);
        return redirect()->route("blogs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view("blogs.edit", compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate(["title"=> "required","content"=> "required","image"=> "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"],
            ["title.required" => "الرجاء ادخال عنوان المدونة",
            "content.required" => "الرجاء ادخال محتوى المدونة",
            "image.required" => "الرجاء اختيار صورة للمدونة",
            "image.image" => "الرجاء اختيار صورة من نوع png,jpg,jpeg,webp",
            "image.mimes" => "الرجاء اختيار صورة من نوع png,jpg,jpeg,webp",
            "image.max" => "الصورة يجب ان تكون اقل من 2 ميجا",
        ]);
        $blog->title = $request->title;
        $blog->content = $request->content;
        if ($request->file('image')) {
            $destination = 'images/' . $blog->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);

            $imagepath = $image->move("images/blog", $filename); //move to file
            $blog->image = 'blog' . '/' . $filename;
        }
        $blog->save();
        session(['status' => 'تم تعديل المدونة بنجاح']);
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $destination = 'images/' . $blog->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $blog->delete();
        session(['status' => 'تم حذف المدونة بنجاح']);
        return redirect('blogs');
    }
}
