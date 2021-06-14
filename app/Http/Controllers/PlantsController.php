<!-- Controller das culturas ou plantações -->

<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantsController extends Controller
{
    // função para os dados recebidos
    public function store(Request $request)
    {
        // coloca o nome em minusculas
        if ($request->has('name')) {
            $request->merge(array('name' => strtolower($request->name)));
        }

        // valida se o nome tem todas as credenciais corretas
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha|in:alfaces,tomates,cenouras',
            'temperature' => 'required|numeric|between:-100,100',
            'luminosity' => 'required|numeric|between:-100,100',
            'humidity' => 'required|numeric|between:-100,100',
            'wind' => 'required|numeric|between:-100,100',
            'light' => 'required|boolean',
            'watering' => 'required|boolean',
            'window_state' => 'required|boolean'
        ],
        $messages = [
            'name.in' => 'The selected name is invalid. Valid options are \'alfaces\', \'cenouras\' and \'tomates\'.',
        ]
        );

        // se a mesma falhar apresenta erro
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
          // se nao cria uma nova entrada
            $plant = Plant::create($request->all());
        }

        // apresenta mensagem de sucesso
        return response()->json("Registo POST guardado com sucesso!", 201);
    }

    // função para receber os valores dos tomates
    public function get_info_tomates()
    {
        $tomate = Plant::where("name", "tomates")->orderBy("created_at", "DESC")->take(1)->first();
        return response()->json($tomate, 200);
    }

    // função para receber os valores das cenouras
    public function get_info_cenouras()
    {
        $cenoura = Plant::where("name", "cenouras")->orderBy("created_at", "DESC")->take(1)->first();
        return response()->json($cenoura, 200);
    }

    // função para receber os valores das alfaces
    public function get_info_alfaces()
    {
        $alface = Plant::where("name", "alfaces")->orderBy("created_at", "DESC")->take(1)->first();
        return response()->json($alface, 200);
    }
}
