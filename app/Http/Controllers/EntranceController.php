<!-- Controller do histórico de entradas -->

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entrance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntranceController extends Controller
{
    // para entradas no contentor
    public function entrance(Request $request)
    {
        // valida o campo nome
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        // se a mesma falhar apresenta erro
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
        // se nao cria uma nova entrada
            $entrance_person = Entrance::create($request->all());
        }

        // apresenta mensagem de sucesso
        return response()->json("Registo da entrada feito com sucesso!", 201);
    }

    // para entradas na sala de servidores
    public function change_door_server(Request $request)
    {
        // valida se os campos sao os corretos
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required|boolean'
        ]);

        // se a mesma falhar apresenta erro
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
          // se nao cria uma nova entrada
            User::where('name', $request->name)->update(['door' => $request->value]);
            if ($request->value) {
              // se a porta for aberta apresenta mensagem de sucesso com o nome da pessoa
                return response()->json("Olá ".$request->name.", a porta do server room foi aberta com sucesso!", 200);
            }else {
              // se a pessoa já tiver entrado apresenta mensagem que fechou
                return response()->json("A porta foi fechada com sucesso!", 200);
            }
        }
    }

    // função para reeber o estado da porta
    public function get_state_door()
    {
        $users = User::select('name','door')->get();
        foreach ($users as $user) {
            if ($user->door) {
                return response()->json($user, 200);
            }
        }
        return response()->json(False, 200);
    }
}
