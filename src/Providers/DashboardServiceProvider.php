<?php

namespace Level7up\Dashboard\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Util\CacheUtil;
use Illuminate\Support\ServiceProvider;
use Level7up\Dashboard\Facades\Palette;
use Level7up\Dashboard\Facades\SideMenu;
use Level7up\Dashboard\Palette\Generator;
use Level7up\Dashboard\Util\SideMenuUtil;
use Level7up\Dashboard\Console\CreateAdmin;
use Level7up\Dashboard\Facades\Cache as CacheFacade;
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
        $this->mergeConfigFrom(__DIR__.'/../../config/settings.php', 'settings');

        config(['blade-icons.attributes' => ['width' => 16, 'height' => 16,],]);
        Arr::macro('sum', function ($items, $value) {
            return array_sum(Arr::pluck($items, $value));
        });

        Arr::macro('toAttributes', function($array) {
            return implode(' ', array_map(
                fn ($k, $v) => $k . "=" . htmlspecialchars($v),
                array_keys($array),
                $array
            ));
        });
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
        Blade::directive('requirePlugin', function ($name) {
            return '<?php push_script(global_asset("/dashboard/plugins/custom/'.$name.'/'.$name.'.bundle.js")); ?>';
        });
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
            'prefix' =>config('dashboard.prefix.dashboard'),
            'domain' => config('dashboard.domains.dashboard'),
            'as' => 'dashboard.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/auth.php');
        });
        Route::group([
            'middleware' => ['web', 'auth:admin'],
            'prefix' =>config('dashboard.prefix.dashboard'),
            'domain' => config('dashboard.domains.dashboard'),
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
        $this->app->singleton(CacheFacade::class, function () {
            return new CacheUtil;
        });
        $this->app->singleton(Palette::class, function () {
            return new Generator;
        });
    }
}
