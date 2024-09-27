<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('home', HomeController::class);
    Route::resource('users', UserController::class);
    Route::resource('bases', BaseController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
});
