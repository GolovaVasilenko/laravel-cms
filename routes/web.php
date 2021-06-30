<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'backoffice'], function() {
    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
});
