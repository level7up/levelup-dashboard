<?php

namespace Level7up\Dashboard\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Level7up\Dashboard\Console\CreateAdmin;

class DashboardServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/dashboard.php');
        // $this->registerRoutes();
        $this->registerCommands();
        $this->publishes([
            __DIR__ . '/../../public/assets' => public_path('assets/dashboard'),
            __DIR__ . '/../../public/vendor' => public_path('vendor'),
        ], 'dashboard-assets');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'dashboard');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'dashboard');


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
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
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
