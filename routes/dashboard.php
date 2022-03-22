<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\DashboardController;
use Level7up\Dashboard\Http\Controllers\Auth\LoginController;



Route::get('/', [DashboardController::class , 'index'])->name('home');
