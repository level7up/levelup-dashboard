<?php

namespace Level7up\Dashboard\Settings;

use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
{
    public string $facebook;
    public string $twitter;
    public string $linkedin;
    public string $instagram;
    public string $snapchat;
    public string $tiktok;

    public static function group(): string
    {
        return 'social';
    }
}
