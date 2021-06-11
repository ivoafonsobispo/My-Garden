<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\GeneralSensorController;
use App\Http\Controllers\EntranceController;

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

Route::name('api.')->group(function() {
    //Pedido GET para os valores dos sensores individuais
    Route::get('/historico/humidade', [HistoryController::class, 'history_hum_api'])->name('hum');
    Route::get('/historico/luminosidade', [HistoryController::class, 'history_lum_api'])->name('lum');
    Route::get('/historico/temperatura', [HistoryController::class, 'history_temp_api'])->name('temp');
    Route::get('/historico/vento', [HistoryController::class, 'history_wind_api'])->name('wind');

    //Pedido GET para os valores dos sensores gerais
    Route::get('/historico/geral/humidade', [HistoryController::class, 'history_general_hum_api'])->name('hum-geral');
    Route::get('/historico/geral/temperatura', [HistoryController::class, 'history_general_temp_api'])->name('temp-geral');

    //Pedido GET para os valores das diferentes culturas
    Route::get('/historico/alfaces', [HistoryController::class, 'history_alfaces_api'])->name('alfaces');
    Route::get('/historico/cenouras', [HistoryController::class, 'history_cenouras_api'])->name('cenouras');
    Route::get('/historico/tomates', [HistoryController::class, 'history_tomates_api'])->name('tomates');
});

Route::post('plants', [PlantsController::class, 'store']);
//usage: name=cenouras&temperature=32&luminosity=67&humidity=3&light=0&watering=1&photo=webcam.png

Route::get('cenouras', [PlantsController::class, 'get_info_cenouras']);
Route::get('alfaces', [PlantsController::class, 'get_info_alfaces']);
Route::get('tomates', [PlantsController::class, 'get_info_tomates']);


//usage: temperature=23&humidity=32
Route::post('general-sensor', [GeneralSensorController::class, 'store']);

//usage: name="José Areia"
Route::post('entrance', [EntranceController::class, 'entrance']);

Route::post('change-door-server', [EntranceController::class, 'change_door_server']);
Route::get('get-state-door', [EntranceController::class, 'get_state_door']);
