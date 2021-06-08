<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\GeneralSensorController;

/*
|--------------------------------------------------------------------------
| Rotas da API
|--------------------------------------------------------------------------
|
| Aqui encontram-se todas as rotas criadas para o funcionamento correto da API.
| Cada rota definada aponta para um controlador específico, sendo o segundo
| parâmetro o nome da função a ser chamada pela mesma.
|
*/

Route::post('plants', [PlantsController::class, 'store']);
//usage: name=cenouras&temperature=32&luminosity=67&humidity=3&light=0&watering=1&photo=webcam.png
Route::get('cenouras', [PlantsController::class, 'get_info_cenouras']);
Route::get('alfaces', [PlantsController::class, 'get_info_alfaces']);
Route::get('tomates', [PlantsController::class, 'get_info_tomates']);
Route::post('general-sensor', [GeneralSensorController::class, 'store']);
//usage: temperature=23&humidity=32
Route::get('watering', [PlantsController::class, 'watering']);
