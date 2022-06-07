<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\RoleController;
use Level7up\Dashboard\Http\Controllers\AdminController;
use Level7up\Dashboard\Http\Controllers\UsersController;
use Level7up\Dashboard\Http\Controllers\SettingController;
use Level7up\Dashboard\Http\Controllers\DashboardController;
use Level7up\Dashboard\Http\Controllers\Auth\LoginController;
use Level7up\Dashboard\Http\Controllers\PermissionsController;
use Level7up\Dashboard\Http\Controllers\AdminProfileController;



Route::get('/', [DashboardController::class , 'index'])->name('home');
Route::group(['prefix' => 'users','as' => 'users.',], function(){
    if (dashboard_has('user_roles_enabled')) {
        Route::resource('roles' , RoleController::class);
        Route::resource('permissions' , PermissionsController::class);
        Route::post('assign-role/{id}' , [get_dashboard_controller("Users"),'updateUserRole'])->name('assignrole');
    }
});
Route::group(['prefix' => 'admins','as' => 'admins.',], function(){
        Route::resource('roles' , RoleController::class);
        Route::resource('permissions' , PermissionsController::class);
        Route::post('assign-role/{id}' , [get_dashboard_controller("Users"),'updateUserRole'])->name('assignrole');
    
});
Route::resource('users', UsersController::class);
Route::get('admins', [AdminController::class , 'index'])->name('admins');
Route::get('profile', [AdminProfileController::class , 'index'])->name('profile');
Route::put('profile', [AdminProfileController::class , 'index'])->name('profile.update');

// SETTINGS ----------------------------
Route::group(['prefix' => 'settings'], function(){

    Route::get('logos', [SettingController::class, 'index'])->name('settings.updateLogos');
    Route::post('logos', [SettingController::class, 'updateLogos']);

    Route::post('setDefaultlogo/{key}', [SettingController::class, 'setDefaultLogo'])->name('settings.defaultLogo');

    Route::get('general/{locale?}', [SettingController::class, 'general'])->name('settings.updateGeneral');
    Route::post('general', [SettingController::class, 'updateGeneral']);

    Route::get('social', [SettingController::class, 'social'])->name('settings.updateSocial');
    Route::post('social', [SettingController::class, 'updateSocial']);

    Route::get('mobile', [SettingController::class, 'mobile'])->name('settings.updateMobile');
    Route::post('mobile', [SettingController::class, 'updateMobile']);
});
Route::group(['middleware' => 'guest'],function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});






