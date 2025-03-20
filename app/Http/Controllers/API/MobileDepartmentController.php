<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CallUs;
use App\Models\Category;
use App\Models\Department;
use App\Models\ExternalCategory;
use App\Models\Privecy;
use App\Models\Question;
use App\Models\Slide;
use App\Models\Social;
use Illuminate\Http\Request;

class MobileDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBrands()
    {
        $brands=Brand::with('items')->get();
        return response()->json($brands);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function indexDepartments()
    {
        $departments=Department::with('categories')->get();
        return response()->json($departments);
    }

    public function indexCatgories($id)
    {
        $categories=Category::where('department_id',$id)
        ->with(['items'=>function($query){
            $query->where('active',1);
        }])
        ->get();
        if(!$categories){
            return response()->json(['message'=>'القسم غير موجود'],422);
        }
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function indexCallUs()
    {
        $call=CallUs::first();
        return response()->json($call);
    }

    /**
     * Display the specified resource.
     */
    public function indexExternalCategories()
    {
        $external=ExternalCategory::all();
        return response()->json($external);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showExternalCategories($id)
    {
        $external=ExternalCategory::with('externalCategoryItems','externalCategoryItems.item')->where('id',$id)->first();
        if(!$external){
            return response()->json(['message'=>'القسم غير موجود'],422);
        }
        return response()->json($external);
    }

    /**
     * Update the specified resource in storage.
     */
    public function indexPrivecy()
    {
        $privecy=Privecy::first();
        return response()->json($privecy);
    }

    public function indexQuestions()
    {
        $question=Question::first();
        return response()->json($question);
    }

    public function indexSlides()
    {
        $slides=Slide::with('brand')->get();
        return response()->json($slides);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function indexSocial()
    {
        $social=Social::first();
        return response()->json($social);
    }
}
