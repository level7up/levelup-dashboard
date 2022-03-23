<?php
namespace Level7up\Dashboard\Http\Controllers\Dashboard;
use Level7up\Dashboard\Http\Controllers\Controller;



class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard::home');
    }
}
