<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\DashboardController;

// use Level7up\Dashboard\Http\Controllers\Dashboard\DashboardController;

Route::get('/home', [DashboardController::class , 'index'])->name('dashboard');
// Route::get('/home/name', function(){})->name('name');