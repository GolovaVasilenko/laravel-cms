<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\LocalMiddleware;
use Illuminate\Support\Facades\Request as RequestFacade;

Route::group(['prefix' => LocalMiddleware::getLocale()], function(){

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
});
Route::get('setlocale/{lang}', function ($lang) {
    $referer = back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);

    $segments = explode('/', $parse_url);

    if (in_array($segments[1], config('translatable.locales'))) {
        unset($segments[1]);
    }

    if ($lang != config('app.locale')){
        array_splice($segments, 1, 0, $lang);
    }

    $url = RequestFacade::root().implode("/", $segments);

    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);

})->name('setLocale');
