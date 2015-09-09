<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(15);
        return view('questions.index', compact('questions'));
    }


    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function create()
    {
        $tags = Tag::lists('name', 'name');
        return view('questions.create', compact('tags'));
    }


    public function store(QuestionRequest $request)
    {

         $this->createQuestion($request);

        return redirect('questions');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Question $question, QuestionRequest $request)
    {
        $question->update($request->all());

        return redirect('questions/' . $question->id);
    }

    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array   $tags
     */
    private function syncTags(Question $question, array $tags)
    {
        // Create new tags if needed and get ids
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagId = Tag::firstOrCreate(['name' => mb_strtolower($tag, 'UTF-8')])->id;
            $tagIds[] = $tagId;
        }

        // Sync tags based on ids
        $question->tags()->sync($tagIds);
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     */
    private function createQuestion(QuestionRequest $request)
    {
        $question = Auth::user()->questions()->create($request->all());

        $this->syncTags($question, $request->input('tag_list', []));

        return $question;
    }
}