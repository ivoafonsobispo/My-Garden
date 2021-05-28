<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        echo $plants;
    }

    public function store(Request $request)
    {
        $plant = Plant::create($request->all());
        return response()->json($plant, 201);
    }
}
