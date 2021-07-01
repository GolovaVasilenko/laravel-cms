<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'backoffice', 'middleware' => ['auth', 'admin']],  function() {
    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
});
