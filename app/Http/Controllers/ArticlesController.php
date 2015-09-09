<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class ArticlesController extends Controller
{
    /**
     * Create a new articles controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
        $this->middleware('owner', ['only' => 'edit']);
    }



    /**
     * Show all articles.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show a single article.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the page to create the article.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'name');
        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        flash()->success('Your article has been created!');

        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'name');

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list', []));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array   $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        // Create new tags if needed and get ids
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagId = Tag::firstOrCreate(['name' => mb_strtolower($tag, 'UTF-8')])->id;
            $tagIds[] = $tagId;
        }

        // Sync tags based on ids
        $article->tags()->sync($tagIds);
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list', []));

        return $article;
    }
}
