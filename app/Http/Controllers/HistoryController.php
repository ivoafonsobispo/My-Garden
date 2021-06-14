<!-- Controlador de tudo o que envolve históricos -->

<?php

namespace App\Http\Controllers;

use App\Models\GeneralSensor;
use App\Models\Plant;
use App\Models\User;
use App\Models\Entrance;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /*
    * Funções provenientes das rotas "web.php"
    */
    public function history_general_temp()
    {
        return view('history-geral-temp');
    }

    public function history_general_hum()
    {
        return view('history-geral-hum');
    }

    public function history_hum()
    {
        return view('history-hum');
    }

    public function history_lum()
    {
        return view('history-lum');
    }

    public function history_temp()
    {
        return view('history-temp');
    }

    public function history_wind()
    {
        return view('history-wind');
    }

    public function history_alfaces()
    {
        return view('history-alfaces');
    }

    public function history_cenouras()
    {
        return view('history-cenouras');
    }

    public function history_tomates()
    {
        return view('history-tomates');
    }

    /*
    * Funções provenientes das rotas "api.php"
    */

    // função para apresentar o historico geral da temperatura
    public function history_general_temp_api()
    {
        $temperatures = DB::table('general_sensors')->select('temperature', 'created_at')->orderBy("created_at", "DESC")->get();
        $temperatures_graph = GeneralSensor::orderBy("created_at", "ASC")->take(10)->get();

        $data = [];

        foreach($temperatures_graph as $temp) {
            $data['label'][] = date_format($temp->created_at, "D H:i");
            $data['data'][] = (float) $temp->temperature;
        }

        $data['chart_data'] = json_encode($data);

        $all_data = [
            'temperatures' => $temperatures,
            'chart' => $data
        ];

        return response()->json($all_data, 201);
    }

    // função para apresentar o historico geral da humidade
    public function history_general_hum_api()
    {
        $humidities = DB::table('general_sensors')->select('humidity', 'created_at')->orderBy("created_at", "DESC")->get();
        $humidities_graph = GeneralSensor::orderBy("created_at", "ASC")->take(10)->get();

        $data = [];

        foreach($humidities_graph as $hum) {
            $data['label'][] = date_format($hum->created_at, "D H:i");
            $data['data'][] = (float) $hum->humidity;
        }

        $data['chart_data'] = json_encode($data);

        $all_data = [
            'humidities' => $humidities,
            'chart' => $data
        ];

        return response()->json($all_data, 201);
    }

    // função para apresentar o historico da humidade nas plantações
    public function history_hum_api()
    {
        $humidities = DB::table('plants')->select('humidity', 'name', 'created_at')->orderBy("created_at", "DESC")->get();
        foreach ($humidities as $hum) {
            $hum->name = ucfirst($hum->name);
        }
        return response()->json($humidities, 201);
    }

    // função para apresentar o historico da luminosidade nas plantações
    public function history_lum_api()
    {
        $luminosities = DB::table('plants')->select('luminosity', 'name', 'created_at')->orderBy("created_at", "DESC")->get();
        foreach ($luminosities as $lum) {
            $lum->name = ucfirst($lum->name);
        }
        return response()->json($luminosities, 201);
    }

    // função para apresentar o historico da temperatura nas plantações
    public function history_temp_api()
    {
        $temperatures = DB::table('plants')->select('temperature', 'name', 'created_at')->orderBy("created_at", "DESC")->get();
        foreach ($temperatures as $temp) {
            $temp->name = ucfirst($temp->name);
        }
        return response()->json($temperatures, 201);
    }

    // função para apresentar o historico do vento nas plantações
    public function history_wind_api()
    {
        $winds = DB::table('plants')->select('wind', 'name', 'created_at')->orderBy("created_at", "DESC")->get();
        foreach ($winds as $wind) {
            $wind->name = ucfirst($wind->name);
        }
        return response()->json($winds, 201);
    }

    // função para apresentar o historico das alfaces
    public function history_alfaces_api()
    {
        $alfaces = DB::table('plants')->where('name', 'alfaces')->orderBy("created_at", "DESC")->get();
        foreach ($alfaces as $alface) {
            $alface->watering ? $alface->watering = "Ligada" : $alface->watering = "Desligada";
            $alface->light ? $alface->light = "Ligada" : $alface->light = "Desligada";
            $alface->window_state ? $alface->window_state = "Aberta" : $alface->window_state = "Fechada";
        }
        return response()->json($alfaces, 201);
    }

    // função para apresentar o historico das cenuras
    public function history_cenouras_api()
    {
        $cenouras = DB::table('plants')->where('name', 'cenouras')->orderBy("created_at", "DESC")->get();
        foreach ($cenouras as $cenoura) {
            $cenoura->watering ? $cenoura->watering = "Ligada" : $cenoura->watering = "Desligada";
            $cenoura->light ? $cenoura->light = "Ligada" : $cenoura->light = "Desligada";
            $cenoura->window_state ? $cenoura->window_state = "Aberta" : $cenoura->window_state = "Fechada";
        }
        return response()->json($cenouras, 201);
    }

    // função para apresentar o historico dos tomates
    public function history_tomates_api()
    {
        $tomates = DB::table('plants')->where('name', 'tomates')->orderBy("created_at", "DESC")->get();
        foreach ($tomates as $tomate) {
            $tomate->watering ? $tomate->watering = "Ligada" : $tomate->watering = "Desligada";
            $tomate->light ? $tomate->light = "Ligada" : $tomate->light = "Desligada";
            $tomate->window_state ? $tomate->window_state = "Aberta" : $tomate->window_state = "Fechada";
        }
        return response()->json($tomates, 201);
    }

    // função para apresentar o historico das entrandas
    public function history_user_entrance(User $user)
    {
        $user_log = Entrance::where("name", $user->name)->get();
        return view('history-entrance', compact('user_log'));
    }
}
