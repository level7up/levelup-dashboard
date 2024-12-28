<?php
use Illuminate\Support\Facades\Route;

use Level7up\Dashboard\Http\Controllers\Auth\LoginController;



Route::group(['middleware' => 'guest'],function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
