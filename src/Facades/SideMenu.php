<?php
namespace Level7up\Dashboard\Facades;

use Illuminate\Support\Facades\Facade;

class SideMenu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dashboard-side-menu';
    }
}
