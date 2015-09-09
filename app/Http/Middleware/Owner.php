<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Support\Facades\Auth;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // One way
        //$articleId = $request->segments()[1];
        //$article = Article::findOrFail($articleId);


        // Better way (I think)
        if (auth()->check() && auth()->user()->id !== $request->articles->user_id) {
            return redirect('/articles/' . $request->articles->id);
        }

        return $next($request);
    }
}
