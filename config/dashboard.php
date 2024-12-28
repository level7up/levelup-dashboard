<?php
use Illuminate\Support\Facades\Request;

return [
    'domains' => [
        'dashboard' => env("DASHBOARD_DOMAIN", null),
        'api' => env("API_DOMAIN", "api.".Request::getHost()),
    ],
    'prefix' => [
        'dashboard' => !env("DASHBOARD_DOMAIN") ? env("DASHBOARD_PREFIX", '/dashboard') : null,
    ],
    'logo' => [
        'default' => asset('dashboard/media/logos/logo-012.png'),
        'default-dark' => asset('dashboard/media/logos/180x50-dark.png'),
        'favicon' => asset('dashboard/media/logos/60x60.png'),
        'favicon-dark' => asset('dashboard/media/logos/60x60-dark.png'),
        'square' => asset('dashboard/media/logos/256x256.png'),
        'square-dark' => asset('dashboard/media/logos/256x256-dark.png'),
    ],
   'home' => '/dashboard',
    'features' => [
        'user_roles_enabled' => false,
        'user_roles_separated' => false,
        'promo_codes_enabled' => false,
    ],
    'roles' => [
        'colors' => [
            //
        ],
    ],
    'sidebar' => [
    ],
];
