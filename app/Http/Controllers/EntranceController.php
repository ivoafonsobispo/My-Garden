<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entrance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntranceController extends Controller
{
    public function entrance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
            $entrance_person = Entrance::create($request->all());
        }

        return response()->json("Registo da entrada feito com sucesso!", 201);
    }

    public function change_door_server(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
            User::where('name', $request->name)->update(['door' => $request->value]);
            if ($request->value) {
                return response()->json("Olá ".$request->name.", a porta do server room foi aberta com sucesso!", 200);
            }else {
                return response()->json("A porta foi fechada com sucesso!", 200);
            }
        }
    }

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
