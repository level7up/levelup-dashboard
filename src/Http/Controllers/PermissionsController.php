<?php

namespace Level7up\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Level7up\Dashboard\Http\Controllers\Controller;
use Level7up\Dashboard\DataTables\PermissionDataTable;
use Level7up\Dashboard\DataTables\Scopes\GuardPermissions;

class PermissionsController extends Controller
{
    // public $route_group;
    // protected $guard_name;

    // function __construct(Request $request)
    // {
    //     $this->setGuardName($request)
    //         ->setRouteGroup();
    // }

    // private function setGuardName($request)
    // {
    //     $this->guard_name = (explode("/", $request->route()->uri)[1] ?? '') == 'admins' ? 'admin' : 'web';

    //     return $this;
    // }

    // private function setRouteGroup()
    // {
    //     $this->route_group = $this->guard_name == 'admin' ? 'admins' : 'users';

    //     return $this;
    // }

    // public function index(PermissionDataTable $dt)
    // {
    //     return $dt->addScope(new GuardPermissions($this->guard_name))
    //         ->render('dashboard::pages.permissions.index');
    // }
}
