<?php

namespace Level7up\Dashboard\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Level7up\Dashboard\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        // dd(Auth::guard()->user());
        return view('dashboard::admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}