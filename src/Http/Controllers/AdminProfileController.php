<?php

namespace Level7up\Dashboard\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        
        return view('dashboard::pages.admin.profile' ,['admin' => $admin, 'roles'=> Role::where('guard_name', 'admin')->pluck('name', 'id')]);
    }
}
