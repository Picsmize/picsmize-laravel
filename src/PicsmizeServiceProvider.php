<?php

namespace Picsmize\PicsmizeLaravel;

use Illuminate\Support\ServiceProvider;
use Picsmize\PicsmizeLaravel\Picsmize;

class PicsmizeServiceProvider extends ServiceProvider {

    /**
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */

    protected $defer = false;


    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->bootPublishes();
    }


     /**
     * Bootstrap publishes.
     *
     * @return void
     */

    public function bootPublishes()
    {
        $path = realpath(__DIR__ . '/config/picsmize.php');
        $this->publishes([
            $path => config_path('picsmize.php'),
        ]);

    }

    /**
    * Register Picsmize service provider.
    *
    * @return void
    */

    public function register()
    {   
        $this->app->bind('picsmize', function ($app) {
            return new Picsmize($app['config']['picsmize']['api_key']);
        });
    }


    /**
    * Get the services provided by the provider.
    *
    * @return array
    */

    public function provides()
    {
        return array();
    }
}