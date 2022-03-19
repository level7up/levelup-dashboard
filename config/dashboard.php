<?php

return [

    'logo' => [
        'default' => asset('dashboard/media/logos/180x50.png'),
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
        [
            'title' => 'Dashboard',
            'url' => '/dashboard',
            'icon' => 'ri-dashboard-3-line',
        ],
        [
            'title' => 'Users',
            'icon' => 'ri-group-2-line',
            'items' => [
                [
                    'title' => "List users",
                    'url' => '/dashboard/users',
                ]
            ]
        ],
    ],
];