<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringlength('191');

        //? Passing data to include.footer on the frontend side
       view()->composer('includes.footer', function ($view) {
        $view->with('posts', Post::latest('created_at')->take(4)->get());
    });
    }
}
