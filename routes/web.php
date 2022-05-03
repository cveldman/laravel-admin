<?php

use Illuminate\Support\Facades\Route;
use Veldman\Admin\Http\Controllers\Admin\UserController;
use Veldman\Admin\Http\Controllers\App\LoginController;

Route::middleware('web')->prefix('admin')->as('admin.')->group(function () {
    Route::middleware('auth')->group(function() {
        Route::view('/', 'admin::admin.dashboard.index');

        Route::resource('users', UserController::class);
        Route::get('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/profile', [\Veldman\Admin\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [\Veldman\Admin\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    });

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::delete('/logout', [LoginController::class, 'destroy'])->name('logout');
});