<<<<<<< HEAD
<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\DashboardController;
use Level7up\Dashboard\Http\Controllers\Auth\LoginController;

// --------------- AUTH ----------------
Route::get('dashboard/login', [LoginController::class, 'showLoginForm'])->name('dashboard.login');
Route::post('/dashboard/login', [LoginController::class, 'login']);
// Route::post('/dashboard/logout', [LoginController::class, 'logout'])->name('dashboard.logout');



Route::get('/home', [DashboardController::class , 'index'])->name('dashboard');
=======
<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\DashboardController;
use Level7up\Dashboard\Http\Controllers\Auth\LoginController;

 // --------------- AUTH ----------------
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('dashboard.logout');

Route::get('/home', [DashboardController::class , 'index'])->name('home');
>>>>>>> 33d6f31f975fcc4b26055cda5adde90a09f46d5b
