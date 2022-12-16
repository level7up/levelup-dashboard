<?php

namespace Level7up\Dashboard\Providers\Traits;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
            'url' => '/dashboard',
            'icon' => 'phosphor-desktop-duotone',
            'order' => 0,
        ];
    }

    private function getAdminsMenu()
    {
        return [
            'title' => 'Admins',
            'icon' => 'phosphor-user-circle-gear',
            'order' => 300,
            'items' => [
                [
                    'title' => 'List admins',
                    'url' => '/dashboard/admins',
                ],
                [
                    'title' => 'Roles',
                    'url' => '/dashboard/admins/roles',
                ],
                [
                    'title' => 'Permissions',
                    'url' => '/dashboard/admins/permissions',
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
                'url' => '/dashboard/users',
            ];
        }

        if (dashboard_has('user_roles_separated')) {
            $items = [
                [
                    'title' => "Users list",
                    'url' => '/dashboard/users',
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
                    'url' => '/dashboard/users/roles',
                ],
                [
                    'title' => 'Permissions',
                    'url' => '/dashboard/users/permissions',
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
            'url' => '/dashboard/promo-codes',
        ];
    }

    private function getStaticPagesMenu()
    {
        
        return [
            'title' => 'Pages',
            'icon' => 'phosphor-piano-keys-duotone',
            'url' => '/dashboard/pages',
            'order' => 900,
        ];
    }

    private function getCountriesMenu()
    {
        return [
            'title' => 'Countries List',
            'icon' => 'phosphor-piano-keys-duotone',
            'url' => '/dashboard/countries',
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
            'url' => '/dashboard/teams',
            'order' => 1000,
        ];
    }

    private function getSettingsMenu()
    {
        return [
            'title' => 'Settings',
            'icon' => 'phosphor-gear-six-duotone',
            'order' => 1100,
            'items' => [
                [
                    'title' => 'General',
                    'url' => '/dashboard/settings/general/en',
                ],
                [
                    'title' => 'Logos',
                    'url' => '/dashboard/settings/logos',
                ],
                [
                    'title' => 'Social',
                    'url' => '/dashboard/settings/social',
                ],
            ]
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