<?php

use Illuminate\Support\Facades\Route;
use Level7up\Dashboard\Http\Controllers\Auth\LoginController;
use Level7up\Dashboard\Http\Controllers\Dashboard\SettingController;
use Level7up\Dashboard\Http\Controllers\Dashboard\DashboardController;



Route::get('/', [DashboardController::class , 'index'])->name('home');


// SETTINGS ----------------------------
Route::group([
    'prefix' => 'settings'
], function(){

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
