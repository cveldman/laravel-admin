<?php

use Illuminate\Support\Facades\Route;
use Veldman\Admin\Http\Controllers\Admin\UserController;
use Veldman\Admin\Http\Controllers\App\LoginController;

Route::middleware('web')->prefix('admin')->as('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/admin/login', [LoginController::class, 'form']);
Route::post('/admin/login', [LoginController::class, 'login']);