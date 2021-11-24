<?php

use Illuminate\Support\Facades\Route;
use Veldman\Admin\Http\Controllers\Admin\UserController;
use Veldman\Admin\Http\Controllers\Admin\UserGroupController;

Route::middleware('auth:web')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('user-groups', UserGroupController::class);
});
