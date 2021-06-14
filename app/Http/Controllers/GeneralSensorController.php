<!-- Controller dos sensores gerais da dashboard -->

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSensor;
use Illuminate\Support\Facades\Validator;

class GeneralSensorController extends Controller
{
    // função para guardar os valores dos sensores
    public function store(Request $request)
    {
      // valida o campo nome
        $validator = Validator::make($request->all(), [
            'temperature' => 'required|numeric|between:-100,100',
            'humidity' => 'required|numeric|between:-100,100',
        ]);

        // se a mesma falhar apresenta erro
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
          // se nao cria uma nova entrada
            $general_sensor = GeneralSensor::create($request->all());
        }

        // apresenta mensagem de sucesso
        return response()->json("Registo dos valores feito com sucesso!", 201);
    }
}
