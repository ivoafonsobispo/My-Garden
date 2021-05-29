<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantsController extends Controller
{
    public function store(Request $request)
    {
        if ($request->has('name')) {
            $request->merge(array('name' => strtolower($request->name)));
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha|in:alfaces,tomates,cenouras',
            'temperature' => 'required|numeric|between:-100,100',
            'luminosity' => 'required|numeric|between:-100,100',
            'humidity' => 'required|numeric|between:-100,100',
            'light' => 'required|boolean',
            'watering' => 'required|boolean',
            'photo' => 'required',
        ],
        $messages = [
            'name.in' => 'The selected name is invalid. Valid options are \'alfaces\', \'cenouras\' and \'tomates\'.',
        ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
            $plant = Plant::create($request->all());
        }

        return response()->json($plant, 201);
    }
}
