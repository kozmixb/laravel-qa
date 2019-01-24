<?php

namespace App\Http\Controllers;

use App\Answer;
Use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function store(Question $question,Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $question->answers()->create(['body'=>$request->body,'user_id'=>\Auth::id()]);
        return back()->with('success','Your answer has been submitted successfully');
    }
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        return view('answers.edit',compact('question','answer'));
    }

    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        $answer->update($request->validate([
            'body'=> 'required',
        ]));

        return redirect()->route('questions.show',$question->slug)->with('success','Your answer has been updated');
    }
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete',$answer);
        $answer->delete();

        return back()->with('success',"Your answer has been removed");
    }
}
