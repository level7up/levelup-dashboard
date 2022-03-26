<?php

namespace Level7up\Dashboard\Settings;

use Spatie\LaravelSettings\Settings;

class LogoSettings extends Settings
{
    public string $default;
    public string $default_dark;
    public string $favicon;
    public string $favicon_dark;
    public string $square;
    public string $square_dark;

    public static function group(): string
    {
        // dd("HERE");
        return 'logo';
    }

    public function default(string $key)
    {
        return [
            'default' => '/assets/dashboard/media/logos/180x50.png',
            'default_dark' => '/assets/dashboard/media/logos/180x50-dark.png',
            'favicon' => '/assets/dashboard/media/logos/60x60.png',
            'favicon_dark' => '/assets/dashboard/media/logos/60x60-dark.png',
            'square' => '/assets/dashboard/media/logos/256x256.png',
            'square_dark' => '/assets/dashboard/media/logos/256x256-dark.png',
        ][$key];
    }
}
