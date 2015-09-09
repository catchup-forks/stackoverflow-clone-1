<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return $tags;
    }

    public function show(Tag $tag)
    {
        $questions = $tag->questions()->paginate(15);

        return view('questions.index', compact('questions', 'tag'));
    }
}
