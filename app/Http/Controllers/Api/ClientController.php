<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;

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
}
