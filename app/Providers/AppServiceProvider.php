<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('admin', function () {
            if (auth()->user() && auth()->user()->isAdmin()) {
                return 1;
            }
            return 0;
        });

        Blade::if('hasbalance', function ($total) {
            if (auth()->user() && (auth()->user()->getBalance()-$total) >= 0) {
                return 1;
            }
            return 0;
        });

        view()->composer('partials.languaje_switcher', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });

        view()->composer('home.index', function ($view) {
            $view->with('storage_type', config('storagetype.storage_type'));
        });
        view()->composer('product.index', function ($view) {
            $view->with('storage_type', config('storagetype.storage_type'));
        });
        view()->composer('product.show', function ($view) {
            $view->with('storage_type', config('storagetype.storage_type'));
        });
    }
}
