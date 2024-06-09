<?php

use App\Http\Controllers\ACL\PermissionController;
use App\Http\Controllers\ACL\RoleController;
use App\Http\Controllers\ACL\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('backend.pages.');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('users', UserController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);


require __DIR__.'/auth.php';
