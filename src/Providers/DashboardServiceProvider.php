<?php

namespace Level7up\Dashboard\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

use Level7up\Dashboard\Console\CreateAdmin;
use Level7up\Dashboard\Providers\Traits\BootDashboardSidebar;
use Level7up\Dashboard\Providers\Traits\BootLivewireComponents;
use Level7up\Dashboard\Providers\Traits\BootSettingsConfig;

class DashboardServiceProvider extends ServiceProvider
{   use BootSettingsConfig, BootLivewireComponents, BootDashboardSidebar;
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/dashboard.php', 'dashboard');
        config(['blade-icons.attributes' => ['width' => 16, 'height' => 16,],]);
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'dashboard');

        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->configurePublishing();;
        }else {
            // $this->bootSettingsConfig();
            // $this->bootDashboardSidebar();
            $this->bootLivewireComponents();
        }
    }
    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__ . '/../../public/assets' => public_path('assets/dashboard'),
            __DIR__ . '/../../public/vendor' => public_path('vendor'),
        ], 'dashboard-assets');
    }

    private function registerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'auth:admin'],
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/dashboard.php');
        });
    }

    //? package commands
    private function registerCommands()
    {
        // Create Admin Command
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateAdmin::class,
            ]);
        }
    }
}
