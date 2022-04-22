<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\Dashboard;
use Level7up\Dashboard\Http\Controllers\Dashboard\UsersController;



Route::get('/', [Dashboard\DashboardController::class , 'index'])->name('home');

if (dashboard_has('user_roles_enabled')) {
        Route::resource('roles' , Dashboard\RoleController::class);
        Route::resource('permissions' , Dashboard\PermissionsController::class);
        Route::post('assign-role/{id}' , [get_dashboard_controller("Users"),'updateUserRole'])->name('assignrole');
    }
Route::resource('users', UsersController::class);

// SETTINGS ----------------------------
Route::group(['prefix' => 'settings'], function(){

    Route::get('logos', [Dashboard\SettingController::class, 'index'])->name('settings.updateLogos');
    Route::post('logos', [Dashboard\SettingController::class, 'updateLogos']);

    Route::post('setDefaultlogo/{key}', [Dashboard\SettingController::class, 'setDefaultLogo'])->name('settings.defaultLogo');

    Route::get('general/{locale?}', [Dashboard\SettingController::class, 'general'])->name('settings.updateGeneral');
    Route::post('general', [Dashboard\SettingController::class, 'updateGeneral']);

    Route::get('social', [Dashboard\SettingController::class, 'social'])->name('settings.updateSocial');
    Route::post('social', [Dashboard\SettingController::class, 'updateSocial']);

    Route::get('mobile', [Dashboard\SettingController::class, 'mobile'])->name('settings.updateMobile');
    Route::post('mobile', [Dashboard\SettingController::class, 'updateMobile']);
});
