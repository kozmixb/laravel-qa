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
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
