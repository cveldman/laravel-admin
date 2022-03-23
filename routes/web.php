<?php

use Illuminate\Support\Facades\Route;
use Veldman\Admin\Http\Controllers\Admin\UserController;
use Veldman\Admin\Http\Controllers\App\LoginController;

Route::middleware('web')->prefix('admin')->as('admin.')->group(function () {
    Route::middleware('auth')->group(function() {
        Route::view('/', 'admin::admin.dashboard.index');
        Route::resource('users', UserController::class);
    });

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::delete('/logout', [LoginController::class, 'destroy'])->name('logout');
});