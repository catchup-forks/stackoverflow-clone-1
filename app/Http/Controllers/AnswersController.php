<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{

    public function index(Question $question)
    {
        return view('questions.show', compact('question')); // Returns the same page as questions show method because the answers without the question make no sense
    }


    public function show(Question $question, Answer $answer)
    {
        return $answer;
    }

    public function create(Question $question, Answer $answer)
    {
        return view('answers.create', compact('question', 'answer'));
    }


    public function store(Question $question, Request $request)
    {

        $answer = new Answer($request->all());

        $answer->question_id = $question->id;

        Auth::user()->answers()->save($answer);

        return redirect(url('questions', $question->id));
    }

    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit', compact('question', 'answer'));
    }

    public function update(Question $question, Answer $answer, Request $request)
    {
        $answer->update($request->all());

        return redirect('questions/' . $question->id);
    }
}
