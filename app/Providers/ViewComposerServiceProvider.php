<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeAllViews();

        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation bar.
     */
    private function composeNavigation()
    {
        view()->composer('partials.nav', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }

    /**
     * Compose all views with user.
     * (Not needed for auth, just use helper function auth() directly in view)
     */
    private function composeAllViews()
    {
        view()->composer('*', function ($view) {
            // $view->with('user', Auth::user());
        });
    }
}
