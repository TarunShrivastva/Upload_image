<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.nav', 
                'App\Http\ViewMenu\HeaderMenu');
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
}
