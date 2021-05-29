<?php

namespace App\Http\Controllers;

use App\Models\GeneralSensor;
use App\Models\Plant;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function history_geral_temp()
    {
        $temperatures = GeneralSensor::orderBy("created_at", "DESC")->get();
        return view('history-geral-temp', compact('temperatures'));
    }

    public function history_gereal_hum()
    {
        $humidities = GeneralSensor::orderBy("created_at", "DESC")->get();
        return view('history-geral-hum', compact('humidities'));
    }

    public function history_hum()
    {
        $humidities = Plant::orderBy("created_at", "DESC")->get();
        return view('history-hum', compact('humidities'));
    }

    public function history_lum()
    {
        $luminosities = Plant::orderBy("created_at", "DESC")->get();
        return view('history-lum', compact('luminosities'));
    }

    public function history_temp()
    {
        $temperatures = Plant::orderBy("created_at", "DESC")->get();
        return view('history-temp', compact('temperatures'));
    }

    public function history_alfaces()
    {
        $alfaces = Plant::where('name', 'alfaces')->orderBy("created_at", "DESC")->get();
        return view('history-alfaces', compact('alfaces'));
    }

    public function history_cenouras()
    {
        $cenouras = Plant::where('name', 'cenouras')->orderBy("created_at", "DESC")->get();
        return view('history-cenouras', compact('cenouras'));
    }

    public function history_tomates()
    {
        $tomates = Plant::where('name', 'tomates')->orderBy("created_at", "DESC")->get();
        return view('history-tomates', compact('tomates'));
    }
}
