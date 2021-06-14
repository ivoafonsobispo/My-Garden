<!-- Controller da dashboard -->

<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\GeneralSensor;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        // variaveis para os sensores e culturas da dashboard
        $general_sensor = GeneralSensor::orderBy("created_at", "DESC")->take(1)->first();
        $cenoura = Plant::where("name", "cenouras")->orderBy("created_at", "DESC")->take(1)->first();
        $alface = Plant::where("name", "alfaces")->orderBy("created_at", "DESC")->take(1)->first();
        $tomate = Plant::where("name", "tomates")->orderBy("created_at", "DESC")->take(1)->first();
        $plants = array($cenoura, $alface, $tomate);
        return view('dashboard', compact('plants', 'general_sensor'));
    }

    // atualizar a rega
    public function update_watering(Plant $plant)
    {
        if ($plant->watering) {
          // verifica se a humidade esta menor que 20
            if ($plant->humidity < 20) {
                return response()->json("NOK", 403);
            }else {
                // autaliza estado da rega
                Plant::where('id', $plant->id)->update(['watering' => 0]);
            }
        }else {
            // liga a rega
            Plant::where('id', $plant->id)->update(['watering' => 1]);
        }
        // devolve mensagem de atualização
        return response()->json("Watering updated.", 200);
    }

    public function update_light(Plant $plant)
    {
        if ($plant->light) {
          // verifica se a luminosidade esta menor que 30
            if ($plant->luminosity < 30) {
                return response()->json("NOK", 403);
            }else {
              // autaliza estado da lampada
                Plant::where('id', $plant->id)->update(['light' => 0]);
            }
        }else {
          // liga a lampada
            Plant::where('id', $plant->id)->update(['light' => 1]);
        }
        // devolve mensagem de atualização
        return response()->json("Light state updated.", 200);
    }

    public function update_window(Plant $plant)
    {
        if (!$plant->window_state) {
          // verifica se o vento  esta menor que 10
            if ($plant->wind < 10) {
              // autaliza estado da janela
                Plant::where('id', $plant->id)->update(['window_state' => 1]);
            }else {
                return response()->json("NOK", 403);
            }
        }else {
          // fecha a janela
            Plant::where('id', $plant->id)->update(['window_state' => 0]);
        }
        // devolve mensagem de atualização
        return response()->json("Window state updated.", 200);
    }
}
