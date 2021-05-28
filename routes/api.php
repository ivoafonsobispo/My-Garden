<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;

Route::get('plants', [PlantsController::class, 'index']);
Route::post('plants', [PlantsController::class, 'store']);
