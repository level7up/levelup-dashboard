<?php
namespace Level7up\Dashboard\Http\Controllers;
use Level7up\Dashboard\Http\Controllers\Controller;



class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard::home');
    }
}
