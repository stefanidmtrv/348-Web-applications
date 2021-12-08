<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Instagram;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(Instagram::class, function($app){ //this is the service container(we register the instagram service here)
            return new Instagram('Secret Key');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
