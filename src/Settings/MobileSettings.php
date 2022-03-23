<?php

namespace Level7up\Dashboard\Settings;

use Spatie\LaravelSettings\Settings;

class MobileSettings extends Settings
{
    public string $app_store_url;
    public string $google_play_url;
    public string $ios_app_version;
    public string $android_app_version;

    public static function group(): string
    {
        return 'mobile_settings';
    }
}
