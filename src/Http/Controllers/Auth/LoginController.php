<?php

namespace Level7up\Dashboard\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Level7up\Dashboard\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        return view('auth::admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
