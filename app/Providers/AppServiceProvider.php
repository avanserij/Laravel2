<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->menuLoad();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function menuLoad()
    {
        View::composer('app', function($view){
             $view->with('categories', \App\Category::with('children')->where('parent_id', 0)->
             get());
        });
    }
}
