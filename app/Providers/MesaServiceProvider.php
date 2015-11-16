<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App;

class MesaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('mesa', function()
        {
            return new \App\Helper\Mesa;
        });
    }
}
