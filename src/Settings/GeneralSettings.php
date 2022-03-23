<?php

namespace Level7up\Dashboard\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $email;
    public string $phone;
    public array $site_description;
    public array $address;
    public array $slogan;
    public array $copyrights;

    public static function group(): string
    {
        return 'general';
    }
}
