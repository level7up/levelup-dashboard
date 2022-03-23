<?php
namespace Level7up\Dashboard\Settings;

use Spatie\LaravelSettings\Settings;


class HomeSettings extends Settings
{
    public array $hero;
    public array $about;
    public array $services;
    public array $contactUs;
    // public array $portfolio;

    public static function group(): string
    {
        return 'home_page';
    }
}