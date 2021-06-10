<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrance;
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
}
