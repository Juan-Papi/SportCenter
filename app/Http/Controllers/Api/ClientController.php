<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Bitacora;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    use ApiResponder;
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */

    public function listarAreas(): JsonResponse
    {
        $area = Area::all();

        $areas = $area->map(function ($area) {
            $area->img = 'https://source.unsplash.com/800x800/?apartment';
            return $area;
        });
        return $this->success(
            "Obteniendo areas ",
            $areas->toArray(),
        );
    }

    public function reservarAreas(Request $request): JsonResponse
    {
        // Crear la reserva

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'ciudad' => $request->ciudad,
            'sexo' => $request->sexo,
            'telefono' => $request->telefono,
        ]);

        Reserva::create([
            'fecha' => now(),
            'fecha_reserva' => $request->fecha_reserva,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'estado' => 'SOLICITADO',
            'cliente_id' => $cliente->id,
            'user_id' => auth()->id(),
            'area_id' => $request->id_area,
        ]);

        $bitacora = new Bitacora();
        $bitacora->accion = '+++SOLICITUD RESERVA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return $this->success(
            "Reserva guardada",

        );
    }

    public function listarAreasReservadas()
    {
        $reservas = DB::table('reservas')
            ->select(["reservas.id", "reservas.fecha_reserva", "reservas.hora_inicio", "reservas.hora_fin", "reservas.estado", "areas.nombre"])

            ->join('areas', 'areas.id', '=', 'reservas.area_id')
            ->where("user_id", auth()->user()->id)->get();

        // $reservas = Reserva::where("user_id", auth()->user()->id)->get();
        return $this->success(
            "Obteniendo reservas ",
            $reservas->toArray(),
        );
    }
}
