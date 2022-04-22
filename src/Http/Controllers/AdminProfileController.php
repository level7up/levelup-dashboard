<?php

namespace Level7up\Dashboard\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('dashboard::pages.admin.profile' ,['admin' => $admin]);
    }
}
