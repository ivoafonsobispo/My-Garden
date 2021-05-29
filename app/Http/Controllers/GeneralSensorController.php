<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSensor;
use Illuminate\Support\Facades\Validator;

class GeneralSensorController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'temperature' => 'required|numeric|between:-100,100',
            'humidity' => 'required|numeric|between:-100,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
            $general_sensor = GeneralSensor::create($request->all());
        }

        return response()->json($general_sensor, 201);
    }
}
