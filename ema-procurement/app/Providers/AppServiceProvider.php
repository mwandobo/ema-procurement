<?php

namespace App\Providers;

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
        view()->composer('layout.master', function($view) {
            $theme = \Cookie::get('theme');
            if ($theme == 'darkmode') {
                $theme = 'dark';
            }

            $view->with('theme', $theme);
        });

        view()->composer('layout.master-auth', function($view) {
            $theme = \Cookie::get('theme');
            if ($theme == 'darkmode') {
                $theme = 'dark';
            }

            $view->with('theme', $theme);
        });
    }
}
