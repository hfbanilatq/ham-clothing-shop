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
    }
}
