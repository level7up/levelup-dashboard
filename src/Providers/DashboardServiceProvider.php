<?php

namespace Level7up\Dashboard\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

use Level7up\Dashboard\Util\SideMenuUtil;
use Level7up\Dashboard\Console\CreateAdmin;
use Level7up\Dashboard\Providers\Traits\BootSettingsConfig;
use Level7up\Dashboard\Providers\Traits\BootDashboardSidebar;
use Level7up\Dashboard\Providers\Traits\BootLivewireComponents;

class DashboardServiceProvider extends ServiceProvider
{
    use BootSettingsConfig;
    use BootLivewireComponents;
    use BootDashboardSidebar;
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/dashboard.php', 'dashboard');
        config(['blade-icons.attributes' => ['width' => 16, 'height' => 16,],]);
        $this->registerFacades();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'dashboard');

        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->configurePublishing();
            ;
        } else {
            $this->bootSettingsConfig();
            $this->bootDashboardSidebar();
            $this->bootLivewireComponents();
        }
    }
    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__ . '/../../public/assets' => public_path('assets/dashboard'),
            __DIR__ . '/../../public/vendor' => public_path('vendor'),
            __DIR__ . '/../../public/chat' => public_path('chat'),
        ], 'dashboard-assets');
    }

    private function registerRoutes()
    {
        Route::group([
            'middleware' => ['web'],
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/auth.php');
        });
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
    private function registerFacades()
    {
        $this->app->singleton('dashboard-side-menu', function () {
            return new SideMenuUtil();
        });
    }
}