<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('areas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'estado' => 'required|string',
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
        ]);

        // Crear una nueva área en la base de datos usando los datos del formulario
        Area::create($request->all());

        $bitacora = new Bitacora();
        $bitacora->accion = '+++CREAR AREA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('area.index')
            ->with('info', 'Área creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nombre' => 'required|string',
            'estado' => 'required|string',
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
        ]);

        // Actualizar el área en la base de datos usando los datos del formulario
        $area->update($request->all());

        $bitacora = new Bitacora();
        $bitacora->accion = '***ACTUALIZAR AREA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('area.index')->with('info', 'Área actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'XXX ELIMINAR AREA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('area.index')
            ->with('info', 'Área eliminada exitosamente.');
    }
}
