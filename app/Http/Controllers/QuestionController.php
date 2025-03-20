<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view("questions.index", compact("questions"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view("questions.create");
    }
    public function store(Request $request){

       $validate =     $request->validate([
                "question"=> "required",
                "answer"=> "required",
            ],[
                "question.required"=> "الرجاء ادخال السؤال",
                "answer.required"=> "الرجاء ادخال الاجابة",
            ]);
            $question = new Question();
            $question->question = $request->input("question");
            $question->answer = $request->input("answer");
            $question->save();


            session(['status' => "تم اضافة السؤال والجواب بنجاح"]);


            return redirect()->route('questions.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view("questions.edit", compact("question"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            "question"=> "required",
            "answer"=> "required",
        ],[
            "question.required"=> "الرجاء ادخال السؤال",
            "answer.required"=> "الرجاء ادخال الاجابة",
        ]);

        $question->update($request->all());
        session(['status' => "تم تعديل السؤال والجواب بنجاح"]);

        return redirect()->route("questions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        session(['status' => "تم حذف السؤال والجواب بنجاح"]);

        return redirect()->route("questions.index");
    }
}
