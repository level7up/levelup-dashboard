<?php

namespace Level7up\Dashboard\Providers\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Level7up\Dashboard\Facades\Palette;

trait BootDashboardSidebar
{
    public function bootDashboardSidebar()
    {
        $nav = array_merge(config('dashboard.sidebar'), [
            $this->getDashboardMenu(),
            $this->getNavUserMenu(),
            $this->getAdminsMenu(),
            // $this->getContactUsMenu(),
            // $this->getCountriesMenu(),
            // $this->getStaticPagesMenu(),
            $this->getSettingsMenu(),
            // $this->getFAQsMenu(),
            // $this->getCategoriesMenu(),
            // $this->getNotificationsMenu(),
        ]);

        foreach([
            $this->getNavPromoCodeMenu(),
            $this->getTeamsMenu(),
        ] as $item) {
            if (is_array($item)) {
                array_push($nav, $item);
            }
        }


        config([
            'dashboard.sidebar' => $nav
        ]);
    }

    private function getDashboardMenu()
    {
        return [
            'title' => 'Dashboard',
            'url' => '/',
            'icon' => 'phosphor-desktop-duotone',
            'order' => 0,
        ];
    }

    private function getAdminsMenu()
    {
        if (!dashboard_has('user_roles_enabled')) {
                return [
                    'title' => 'Admins',
                    'order' => 300,
                    'icon' => 'phosphor-user-circle-gear',
                    'url' => '/admins',
                ];
            }
        return [
            'title' => 'Admins',
            'icon' => 'phosphor-user-circle-gear',
            'order' => 300,
            'items' => [
                [
                    'title' => 'List admins',
                    'url' => '/admins',
                ],
                [
                    'title' => 'Roles',
                    'url' => '/admins/roles',
                ],
                [
                    'title' => 'Permissions',
                    'url' => '/admins/permissions',
                ],
            ]
        ];
    }

    private function getNavUserMenu()
    {
        if (!dashboard_has('user_roles_enabled')) {
            return [
                'title' => 'Users',
                'order' => 200,
                'icon' => 'phosphor-user-focus',
                'url' => '/users',
            ];
        }

        if (dashboard_has('user_roles_separated')) {
            $items = [
                [
                    'title' => "Users list",
                    'url' => '/users',
                ]
            ];
        }

        return [
            'title' => 'Users',
            'order' => 20,
            'icon' => 'phosphor-piano-keys-duotone',
            'items' => array_merge($items, [
                [
                    'title' => 'Roles',
                    'url' => '/users/roles',
                ],
                [
                    'title' => 'Permissions',
                    'url' => '/users/permissions',
                ],
            ]),
        ];
    }

    private function getNavPromoCodeMenu()
    {
        if (!dashboard_has('promo_codes_enabled')) {
            return;
        }

        return [
            'title' => 'Promo Codes',
            'icon' => 'phosphor-piano-keys-duotone',
            'order' => 900,
            'url' => '/promo-codes',
        ];
    }

    private function getStaticPagesMenu()
    {

        return [
            'title' => 'Pages',
            'icon' => 'phosphor-piano-keys-duotone',
            'url' => '/pages',
            'order' => 900,
        ];
    }

    private function getCountriesMenu()
    {
        return [
            'title' => 'Countries List',
            'icon' => 'phosphor-piano-keys-duotone',
            'url' => '/countries',
            'order' => 1000,
        ];
    }

    private function getTeamsMenu()
    {
        if (!dashboard_has('teams_enabled')) {
            return;
        }

        return [
            'title' => 'Teams',
            'icon' => 'phosphor-piano-keys-duotone',
            'url' => '/teams',
            'order' => 1000,
        ];
    }

    private function getSettingsMenu()
    {
        $menu = array_unique(Arr::pluck(Palette::list(), 'menu', 'name'));
        $items = [];
        foreach ($menu as $name => $item) {
            $items[] = [
                'title' => trans('dashboard::site.'.($item ?? $name)),
                'url' => dashboard_path("palette/{$item}/".($name ?? $item)),
            ];
        }
        return [
            'title' => 'Settings',
            'icon' => 'phosphor-gear-six-duotone',
            'order' => 1100,
            'items'=> $items
            // 'items' => [
            //     [
            //         'title' => 'General',
            //         'url' => '/settings/general/en',
            //     ],
            //     [
            //         'title' => 'Logos',
            //         'url' => '/settings/logos',
            //     ],
            //     [
            //         'title' => 'Social',
            //         'url' => '/settings/social',
            //     ],
            // ]
        ];
    }

    public function getFAQsMenu()
    {
        return [
            'title' => 'Faqs',
            'icon' => 'phosphor-piano-keys-duotone',
            'url'=>'/dashboard/faqs',
            'order' => 800,
        ];
    }

    private function getContactUsMenu()
    {
        return [
            'title' => 'Contact us',
            'icon' => 'phosphor-piano-keys-duotone',
            'order' => 800,
            'url' => '/dashboard/messages',
        ];
    }

    private function getCategoriesMenu()
    {
        return [
            'title' => 'Categories',
            'icon' => 'phosphor-piano-keys-duotone',
            'order' => 400,
            'url' => '/dashboard/categories',
        ];
    }

    private function getNotificationsMenu()
    {
        return [
            'order' => 888,
            'title' => 'Send Notifications',
            'url' => '/dashboard/notification',
            'icon' => 'phosphor-piano-keys-duotone',
        ];
    }
}
