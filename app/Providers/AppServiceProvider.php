<?php

namespace App\Providers;

use App\Models\Market\ProductCategory;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::composer('*', function($view) {
            $menus = Menu::whereNull('parent_id')->get();
            $view->with('menus', $menus);
        });

        View::composer('*', function($view) {
            $productCategories = ProductCategory::with(['products' => function ($query) {
                $query->latest()->take(10);
            }])->get();
            $view->with('productCategories', $productCategories);
        });

        View::composer('*', function($view) {
            $tags = Tag::all();
            $view->with('tags', $tags);
        });

        
        // auth()->loginUsingId(1);
        // Model::preventsLazyLoading();
    }
}
