<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Level7up\Dashboard\Palette\Palette;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Level7up\Dashboard\Exceptions\ClassDoseNotExist;
use Level7up\Dashboard\Exceptions\PaletteGroupNotFound;;
use Level7up\Dashboard\Facades\Palette as PaletteFacade;
use Illuminate\Contracts\Container\BindingResolutionException;
if (! function_exists('upload')) {
    /**
     * Upload a file to public storage.
     *
     * @param UploadedFile $file
     * @param string|null $folder
     * @param string|null $sub_folder
     * @return string
     */
    function upload(UploadedFile $file, string $folder = null, string $sub_folder = null): string
    {
        $folder = config("support.filesystem.{$folder}") ?? $folder;

        return Storage::disk('public')->putFile(
            rtrim(implode('/', [$folder, $sub_folder]), '/'),
            $file
        );
    }
}

if (! function_exists('is_menu_active')) {
    /**
     * Is menu active
     *
     * @param mixed $urls
     * @return bool
     */
    function is_menu_active($urls): bool
    {
        if (!is_array($urls)) {
            return Str::is($urls, request()->getRequestUri());
        }

        foreach (Arr::flatten(Arr::pluck($urls, 'url')) as $url) {
            if (request()->is(ltrim(parse_url($url, PHP_URL_PATH), "/"))) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('palette') ) {
    /**
     * Return palette instance
     *
     * @param string $key
     * @return Palette
     */
    function palette(string $key): Palette {
        return PaletteFacade::make($key)
            ->instance();
    }
}

if (! function_exists('setting')) {
    /**
     * Get setting from setting group class
     *
     * @param string $group general_value
     * @param string $name site_name
     * @param  $fallback_value
     */
    function setting(string $group, string $name, $fallback_value = null)
    {
        try {
            $value = palette($group)->find($name)?->getValue();
            return $value ? $value : $fallback_value;
        } catch (PaletteGroupNotFound $x) {
            return $fallback_value;
        } catch (BindingResolutionException $x) {
            return $fallback_value;
        }
    }
}

if (!function_exists('setting_update')) {
    /**
     * Update setting by using setting group class
     *
     * @param string $group general_value
     * @param string,array $name site_name, ['site_name' => 'new website']
     * @param $new_value
     * @return object GeneralSettings
     */
    function setting_update(string $group, $name, $new_value = null)
    {
        $settingClass = app(get_setting_group_class($group));
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $settingClass->$key = $value;
            }
        } else {
            $settingClass->$name = $new_value;
        }

        return $settingClass->save();
    }
}

if (!function_exists('get_setting_group_class')) {
    /**
     * Get setting group class
     *
     * Incase of ClassSetting similarity,
     * it returns the first class from settings.settings
     *
     * The group class name should ends with settings keyword
     * ex: GeneralSettings
     *
     * @param string $group general_values
     * @return object
     */
    function get_setting_group_class(string $group)
    {
        $group = implode('', array_map(function ($group_piece) {
            return ucfirst($group_piece);
        }, explode('_', $group)));
        $groupSettings = "{$group}Settings";
        $namespace = preg_grep("~{$groupSettings}~", config('settings.settings'));
        // dd($namespace);
        if (count($namespace) > 0) {
            return array_values($namespace)[0];
        }

        // throw new Spatie\LaravelSettings\Exceptions\MissingSettings();
    }
}

if (! function_exists('dashboard_has')) {
    /**
     * Check if theme has feature enabled
     *
     * @param string $key
     * @return bool
     */
    function dashboard_has(string $key)
    {
        return config("dashboard.features.{$key}", false) == true;
    }
}

if (! function_exists('get_previous_url')) {
    /**
     * Get pervious url
     *
     * @return string
     */
    function get_previous_url()
    {
        $current = explode(".", Route::currentRouteName());

        $popped = array_pop($current);

        if ($popped == 'index') {
            return null;
        }

        $current = implode(".", $current + ['index']);

        if (Route::has($current)) {
            return route($current);
        }

        return "/".str_replace(config('app.url')."/", "", URL::previous());
        // return null;
        // $current = explode("/", str_replace(config('app.url')."/", "", URL::previous()));
    }
}

if (! function_exists('get_dashboard_controller')) {
    /**
     * Check and return controller class overridden in base project
     *
     * @param string $name
     * @return string
     */
    function get_dashboard_controller(string $name)
    {
        return class_exists("App\Http\Controllers\Dashboard\\{$name}Controller") ?
            "App\Http\Controllers\Dashboard\\{$name}Controller" :
            "Level7up\Dashboard\Http\Controllers\\{$name}Controller";
    }
}

if (! function_exists('get_dashboard_transformer')) {
    /**
     * Check and return transformer class overridden in base project
     *
     * @param string $name
     * @return string
     */
    function get_dashboard_transformer(string $name)
    {
        return class_exists("App\Transformers\\{$name}Transformer") ?
            "App\Transformers\\{$name}Transformer" :
            "Levelup\Dashboard\Transformers\\{$name}Transformer";
    }
}

if (! function_exists('get_lang')) {
    /**
     * Get language lang
     *
     * @return string
     */
    function get_lang()
    {
        $lang = request()->header('lang', config('app.fallback_locale'));
        return in_array($lang, config('app.supported_languages')) ? $lang : config('app.fallback_locale');
    }
}


if (! function_exists('fractal_response')) {
    function fractal_response($model, array $includes = [], array $meta = [])
    {
        $transformerSuffix = $model;

        if ($model instanceof LengthAwarePaginator || $model instanceof Paginator || $model instanceof Collection) {
            // todo: need to think of better way to handle empty collections
            $transformerSuffix = $model->first() ?? "User";
        }

        $transformer = get_dashboard_transformer(class_basename($transformerSuffix));

        $fractal = fractal(
            $model,
            new $transformer(),
        )->parseIncludes($includes);

        if (count($meta)) {
            $fractal = $fractal->addMeta(['pagination' => $meta]);
        }

        return $fractal->respond();
    }
}

if (! function_exists('api_response')) {
    /**
     * Return api response
     *
     * @param string $message
     * @param int $status
     * @param array $data
     *
     * @return JsonResponse
     */
    function api_response(string $message, int $status = 200, array $data = [])
    {
        return new JsonResponse([
            'message' => $message,
            'data' => $data,
            'status' => $status >= 200 && $status <= 299
        ], $status);
    }
}

if (! function_exists('get_api_controller')) {
    /**
     * Check and return controller class overridden in base project
     *
     * @param string $name
     * @return string
     */
    function get_api_controller(string $name)
    {
        return class_exists("App\Http\Controllers\API\\{$name}Controller") ?
            "App\Http\Controllers\API\\{$name}Controller" :
            "Levelup\Dashboard\Http\Controllers\API\\{$name}Controller";
    }
}

if (! function_exists('bs_color')) {
    /**
     * Get bootstrap color relative to given id
     *
     * @param int $id
     * @return string
     */
    function bs_color($id = 0): string
    {
        return ['danger', 'info', 'warning', 'success', 'primary'][$id%5];
    }
}

if(! function_exists('rand_abstract')){

    function rand_abstract($is_dark = null){
        if(is_null($is_dark)){
            return asset('dashboard/media/svg/shapes/abstract-'.rand(1,5).'.svg');
        }
        return asset('dashboard/media/svg/shapes/abstract-'.rand(1,5).'-dark.svg');
    }
}
if (! function_exists('is_dark')) {
    /**
     * Return if dark mode enabled
     *
     * @return mixed
     */
    function is_dark(...$args)
    {
        if (count($args) > 0) {
            return Cookie::get('dark_mode') ? $args[0] : ($args[1] ?? null);
        }

        return Cookie::get('dark_mode');
    }
}

if (! function_exists('get_model')) {
    /**
     * Get first model from classes stack
     *
     * @param string $key
     * @return string
     */
    function get_model(string $name)
    {
        return get_first_class('Models', $name);
    }
    if (! function_exists('get_first_class')) {
        /**
         * Get first important class.
         *
         * @param string $namespace
         * @param string $name
         *
         * @return string
         */
        function get_first_class(string $namespace, string $name): string
        {
            $arr = [
                "App\\{$namespace}\\{$name}" => class_exists("App\\{$namespace}\\{$name}"),
                "App\\{$namespace}\\Central\\{$name}" => class_exists("App\\{$namespace}\\Central\\{$name}"),
                "Level7up\Dashboard\\{$namespace}\\{$name}" => class_exists("Level7up\Dashboard\\{$namespace}\\{$name}"),
            ];

            $class = array_search(true, $arr);

            throw_unless($class, ClassDoseNotExist::class, $arr);

            return $class;
        }
    }
}
if (! function_exists('dashboard_path')) {
    /**
     * Get dashboard path
     *
     * @param string $path
     * @return string
     */
    function dashboard_path(string $path = null)
    {
        return sprintf('%s/%s', config('dashboard.prefix.dashboard'), $path);
    }
}

if (! function_exists('push_script')) {
    /**
     * Push to metronic script
     *
     * @param string $key
     * @return void
     */
    function push_script(string $script)
    {
        $scripts = config('metronic.scripts', []);

        $scripts[$script] = $script;

        config(['metronic.scripts' => $scripts]);
    }
}
if (! function_exists('global_asset')) {
    /**
     * Global asset helper. Needed in saas projects
     *
     * @param string $asset
     * @return string
     */
    function global_asset(string $asset)
    {
        return env('ASSET_URL')."/{$asset}";
    }
}
