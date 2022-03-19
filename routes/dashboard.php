<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\DashboardController;
use Level7up\Dashboard\Http\Controllers\Auth\LoginController;


 // --------------- AUTH ----------------
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [DashboardController::class , 'index'])->middleware('auth')->name('home');