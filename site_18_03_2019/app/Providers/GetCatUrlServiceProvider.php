<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class GetCatUrlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.header', 
                'App\Http\ViewMenu\CatUrl');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/Admin/getCatUrl.php';
    }
}
