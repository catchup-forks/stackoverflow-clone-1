<?php

namespace App\Providers;

use App\Answer;
use App\Article;
use App\Question;
use App\Tag;
use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->bind('articles', function($id)
        {
            $article = Article::findOrFail($id);

            // If the owner return all articles else return only published.
            if (Auth::user() && $article->user_id === Auth::user()->id) {
                $articles = Article::findOrFail($id);
            } else {
                $articles = Article::published()->findOrFail($id);
            }
            return $articles;
        });

        $router->bind('questions', function($id)
        {
            return Question::findOrFail($id);
        });
        $router->bind('answers', function($id)
        {
            return Answer::findOrFail($id);
        });


        $router->bind('tags', function($name)
        {
            return Tag::where('name', $name)->firstOrFail();
        });

        $router->bind('users', function($id)
        {
            return User::findOrFail($id);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
