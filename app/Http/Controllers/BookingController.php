<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admbooking.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $clientes = Cliente::all();
        $areas = Area::all();
        return view('admbooking.create',  compact('clientes', 'users', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'estado' => 'required|in:SOLICITADO,FINALIZADO,APROBADO',
            'user_id' => 'required|exists:users,id',
            'cliente_id' => 'required|exists:clientes,id',
            'area_id' => 'required|exists:areas,id',
        ]);

        Reserva::create($request->all());

        $bitacora = new Bitacora();
        $bitacora->accion = '+++CREAR RESERVA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('booking.index')->with('info', 'Reserva creada exitosamente.');
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
    public function edit(Reserva $reserva)
    {
        $users = User::all();
        $clientes = Cliente::all();
        $areas = Area::all();
        return view('admbooking.edit', compact('reserva', 'users', 'areas', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'fecha' => 'required|date',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'estado' => 'required|in:SOLICITADO,FINALIZADO,APROBADO',
            'user_id' => 'required|exists:users,id',
            'cliente_id' => 'required|exists:clientes,id',
            'area_id' => 'required|exists:areas,id',
        ]);

        $reserva->update($request->all());

        $bitacora = new Bitacora();
        $bitacora->accion = '***ACTUALIZAR RESERVA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('booking.index')->with('info', 'Reserva actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'XXX ELIMINAR RESERVA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('booking.index')
            ->with('info', 'Reserva eliminada exitosamente.');
    }
}
