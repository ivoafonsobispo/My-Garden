<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;

Route::middleware(['prevent.history'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::get('data', [DataController::class, 'create_users']);
