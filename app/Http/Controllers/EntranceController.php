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

    public function open_door_server(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }else {
            User::where('username', $request->name)->update(['door' => $request->value]);
            return response()->json("Olá ".$request->name.", a porta do server room foi aberta com sucesso!", 201);
        }
    }
}
