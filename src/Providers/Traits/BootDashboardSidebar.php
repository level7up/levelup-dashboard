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
            $this->getContactUsMenu(),
            $this->getCountriesMenu(),
            $this->getStaticPagesMenu(),
            $this->getSettingsMenu(),
            $this->getFAQsMenu(),
            $this->getCategoriesMenu(),
            $this->getNotificationsMenu(),
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
            'icon' => 'duotune-general-001',
            'order' => 0,
        ];
    }

    private function getAdminsMenu()
    {
        return [
            'title' => 'Admins',
            'icon' => 'duotune-general-049',
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
                'icon' => 'duotune-communication-013',
                'url' => '/dashboard/users',
            ];
        }

        if (dashboard_has('user_roles_separated')) {
            $items = Role::where('guard_name', 'web')->pluck('name')->map(function ($name) {
                return [
                    'title' => Str::plural($name)." list",
                    'url' => "/dashboard/users?role=${name}",
                ];
            })->toArray();
        } else {
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
            'icon' => 'duotune-communication-013',
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
            'icon' => 'duotune-ecommerce-003',
            'order' => 900,
            'url' => '/dashboard/promo-codes',
        ];
    }

    private function getStaticPagesMenu()
    {
        return [
            'title' => 'Pages',
            'icon' => 'duotune-general-054',
            'url' => '/dashboard/pages',
            'order' => 900,
        ];
    }

    private function getCountriesMenu()
    {
        return [
            'title' => 'Countries List',
            'icon' => 'duotune-maps-004',
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
            'icon' => 'duotune-technology-001',
            'url' => '/dashboard/teams',
            'order' => 1000,
        ];
    }

    private function getSettingsMenu()
    {
        return [
            'title' => 'Settings',
            'icon' => 'duotune-coding-009',
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
            'icon' => 'duotune-communication-007',
            'url'=>'/dashboard/faqs',
            'order' => 800,
        ];
    }

    private function getContactUsMenu()
    {
        return [
            'title' => 'Contact us',
            'icon' => 'duotune-communication-010',
            'order' => 800,
            'url' => '/dashboard/messages',
        ];
    }

    private function getCategoriesMenu()
    {
        return [
            'title' => 'Categories',
            'icon' => 'duotune-files-001',
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
            'icon' => 'duotune-general-016',
        ];
    }
}
