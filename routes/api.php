<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\GeneralSensorController;

//usage: name=cenouras&temperature=32&luminosity=67&humidity=3&light=0&watering=1&photo=webcam.png
//usage: temperature=23&humidity=32

Route::post('plants', [PlantsController::class, 'store']);
Route::post('general-sensor', [GeneralSensorController::class, 'store']);
