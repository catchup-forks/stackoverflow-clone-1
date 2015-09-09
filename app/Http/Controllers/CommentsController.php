<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function index(Question $question, Answer $answer)
    {
        // To do: remove index.

        if ($answer->exists) {
            return $answer->comments;
        } else {
            return $question->comments;
        }
    }

    /**
     * Redirects to the comment on the questions page.
     * @param  string $id The id of the comment.
     * @return Redirect
     */
    public function show($id)
    {

        $comment = Comment::findOrFail($id);

        $commentable = $comment->commentable;

        if (get_class($commentable) === 'App\Question') {
            $questionId = $commentable->id;
        } else {
            $questionId = $commentable->question->id;
        }

        $bookmark = '#comment-' . $comment->id;

        return redirect(route('questions.show', $questionId) . $bookmark);

    }

    public function create($object, Request $request)
    {

        if ($request->segment(1) === 'questions') {

            return view('comments.create_for_question', ['question' => $object]);

        } else if ($request->segment(1) === 'answers') {

            return view('comments.create_for_answer', ['answer' => $object]);

        }


    }


    public function store($object, Request $request)
    {

        $comment = new Comment($request->all());

        $comment->user_id = Auth::user()->id;

        $object->comments()->save($comment);

        // Save on the correct model
        if ($request->segment(1) === 'answers') {

            $redirectId = $object->question->id;

        } else if ($request->segment(1) === 'questions') {

            $redirectId = $object->id;
        }

        return redirect(url('questions', $redirectId));
    }

    // public function edit(Answer $answer)
    // {
    //     return view('answers.edit', compact('answer'));
    // }

    // public function update(Answer $answer, Request $request)
    // {
    //     $answer->update($request->all());

    //     return redirect('answers');
    // }
}
