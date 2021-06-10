<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\GeneralSensor;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $general_sensor = GeneralSensor::orderBy("created_at", "DESC")->take(1)->first();
        $cenoura = Plant::where("name", "cenouras")->orderBy("created_at", "DESC")->take(1)->first();
        $alface = Plant::where("name", "alfaces")->orderBy("created_at", "DESC")->take(1)->first();
        $tomate = Plant::where("name", "tomates")->orderBy("created_at", "DESC")->take(1)->first();
        $plants = array($cenoura, $alface, $tomate);
        return view('dashboard', compact('plants', 'general_sensor'));
    }

    public function update_watering(Plant $plant)
    {
        if ($plant->watering) {
            if ($plant->humidity < 20) {
                return response()->json("NOK", 403);
            }else {
                Plant::where('id', $plant->id)->update(['watering' => 0]);
            }
        }else {
            Plant::where('id', $plant->id)->update(['watering' => 1]);
        }
        return response()->json("Watering updated.", 201);
    }

    public function update_light(Plant $plant)
    {
        if ($plant->light) {
            if ($plant->luminosity < 30) {
                return response()->json("NOK", 403);
            }else {
                Plant::where('id', $plant->id)->update(['light' => 0]);
            }
        }else {
            Plant::where('id', $plant->id)->update(['light' => 1]);
        }
        return response()->json("Light state updated.", 201);
    }

    public function update_window(Plant $plant)
    {
        if (!$plant->window_state) {
            if ($plant->wind < 10) {
                Plant::where('id', $plant->id)->update(['window_state' => 1]);
            }else {
                return response()->json("NOK", 403);
            }
        }else {
            Plant::where('id', $plant->id)->update(['window_state' => 0]);
        }
        return response()->json("Window state updated.", 201);
    }
}
