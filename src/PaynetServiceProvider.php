<?php

namespace Payment\Paynet;

use Illuminate\Support\ServiceProvider;

class PaynetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('paynet.php')
            ], 'paynet-config');
            $this->publishes([
                __DIR__.'/Http/Controllers/PaynetController.php' => app_path('Http/Controllers/PaynetController.php'),
            ], 'paynet-contoller');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'paynet');

        // Register the main class to use with the facade
        $this->app->singleton('paynet', function () {
            return new PaynetService;
        });
    }
}