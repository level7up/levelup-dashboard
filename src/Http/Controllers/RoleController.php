<?php

namespace Level7up\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Level7up\Dashboard\Http\Controllers\Controller;

class RoleController extends Controller
{
    public $route_group;
    protected $guard_name;

    public function __construct(Request $request)
    {
        $this->setGuardName($request)
            ->setRouteGroup();
    }

    private function setGuardName($request)
    {
        $this->guard_name = (explode("/", $request->route()->uri)[1] ?? '') == 'admins' ? 'admin' : 'web';

        return $this;
    }

    private function setRouteGroup()
    {
        $this->route_group = $this->guard_name == 'admin' ? 'admins' : 'users';

        return $this;
    }

    public function index()
    {
        if ($this->guard_name == 'web') {
            $roles = Role::where('guard_name', 'api')->get();
        } else {
            $roles = Role::where('guard_name', $this->guard_name)->get();
        }

        $data = [
            'roles' =>$roles,
            'route_group' => $this->route_group,
        ];
        return view('dashboard::pages.roles.index', $data);
    }

    public function create()
    {
        $roles = Role::where('guard_name', $this->guard_name == 'web' ? 'api' : $this->guard_name)->get();

        return view('dashboard::pages.roles.create', [
            'route_group' => $this->route_group,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        if ($this->guard_name != 'admin') {
            Role::create(['name' => $request->name, 'guard_name' => 'api']);
            Role::create(['name' => $request->name, 'guard_name' => 'web']);
        } else {
            Role::create(['name' => $request->name, 'guard_name' => $this->guard_name]);
        }

        return $this->successRedirect(
            'dashboard.'. $this->route_group .'.roles.index',
            trans("dashboard::messages.role.created", ['role' => $request->name])
        );
    }

    public function show(Role $role)
    {
        // todo: Septate login of API guard from web
        if ($this->guard_name == 'web') {
            $role = Role::where('name', $role->name)
                ->where('guard_name', 'web')
                ->first();
            $users = $role->users ?? [];
            $permissions = $role->permissions;
        } else {
            $users = $role->users;
            $permissions = $role->permissions;
        }

        return view('dashboard::pages.roles.show', compact('role', 'users', 'permissions'));
    }

    public function edit(Role $role)
    {
        return view('dashboard::pages.roles.edit', [
            'role'=> $role,
            'route_group' => $this->route_group
        ]);
    }

    public function update(Request $request, Role $role)
    {
        try {
            //code...
            $request->validate([
            'name' => 'required|unique:roles',
            ]);

            $role->name = $request->name;
            $role->save();
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }

        return $this->successRedirect(
            'dashboard.'. $this->route_group .'.roles.index',
            trans("dashboard::messages.role.updated", ['role' => $request->name])
        );
    }

    public function destroy($id)
    {
        $role  = Role::find($id);
        Role::where('name', $role->name)->delete();
        
        return $this->successRedirect(
            'dashboard.'. $this->route_group .'.roles.index',
            trans("dashboard::messages.role.deleted")
        );
    }
}