<?php

namespace App\Providers;

use App\Models\category;
use App\Models\PostNews;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $categorys = category::all();
        $postnews = PostNews::latest()->paginate(6);
        DB::enableQueryLog();
        $categoryPosts = category::with('posts')->get()->map(function ($category) {
            return $category->setRelation('posts', $category->posts->take(6));
        });
        $views = PostNews::orderBy('views', 'DESC')->paginate(6);
        View::share('postnews', $postnews);
        View::share('categorys', $categorys);
        View::share('views', $views);
        View::share('categoryPosts', $categoryPosts);
    }
}
