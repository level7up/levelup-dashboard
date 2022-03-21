<?php

namespace Level7up\Dashboard\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Level7up\Dashboard\Console\CreateAdmin;

class DashboardServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/dashboard.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'dashboard');
        $this->registerRoutes();
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            // $this->registerCommands();
        }
        $this->publishes([
            __DIR__ . '/../../public/assets' => public_path('assets/dashboard'),
            __DIR__ . '/../../public/vendor' => public_path('vendor'),
        ], 'dashboard-assets');


    }
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/dashboard.php',
            'dashboard'
        );
    }
    private function registerRoutes()
    {
        Route::group([
            'middleware' => ['web'],
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/dashboard.php');
        });

    }
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateAdmin::class,
            ]);
        }
    }

}
