<?php

use Illuminate\Support\Facades\Route;
use Veldman\Admin\Http\Controllers\Admin\UserController;

Route::middleware('web')->prefix('admin')->as('admin.')->group(function () {
    Route::resource('users', UserController::class);
});
