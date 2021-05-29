<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;

// use App\Http\Controllers\DataController;
// //Uncomment this lines, and run "/data" to create the users.
// Route::get('data', [DataController::class, 'create_users']);

Route::middleware(['prevent.history'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/historico/geral/temperatura', [HistoryController::class, 'history_geral_temp'])->name('history-geral.temp');
        Route::get('/historico/geral/humidade', [HistoryController::class, 'history_gereal_hum'])->name('history-geral.hum');
        Route::get('/historico/humidade', [HistoryController::class, 'history_hum'])->name('history.hum');
        Route::get('/historico/luminosidade', [HistoryController::class, 'history_lum'])->name('history.lum');
        Route::get('/historico/temperatura', [HistoryController::class, 'history_temp'])->name('history.temp');
        Route::get('/historico/alfaces', [HistoryController::class, 'history_alfaces'])->name('history.alfaces');
        Route::get('/historico/cenouras', [HistoryController::class, 'history_cenouras'])->name('history.cenouras');
        Route::get('/historico/tomates', [HistoryController::class, 'history_tomates'])->name('history.tomates');
    });
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});
