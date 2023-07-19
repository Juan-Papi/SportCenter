<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Reserva;
use Livewire\Component;

class ReservarAreas extends Component
{
    public $areas;
    public $selectedAreaId;
    public $fecha_reserva;
    public $hora_inicio;
    public $hora_fin;
    public $nombre;
    public $paterno;
    public $materno;
    public $ciudad;
    public $sexo;
    public $telefono;

    public function mount()
    {
        $this->areas = Area::all();
    }
    public function reservar()
    {
        $this->validate([
            'selectedAreaId' => 'required|exists:areas,id',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'nombre' => 'required|string',
            'paterno' => 'required|string',
            'materno' => 'required|string',
            'ciudad' => 'required|string',
            'sexo' => 'required|string|in:masculino,femenino',
            'telefono' => 'required|string',
        ]);

        // Crear la reserva
        $area = Area::findOrFail($this->selectedAreaId);
        $cliente = Cliente::create([
            'nombre' => $this->nombre,
            'paterno' => $this->paterno,
            'materno' => $this->materno,
            'ciudad' => $this->ciudad,
            'sexo' => $this->sexo,
            'telefono' => $this->telefono,
        ]);

        Reserva::create([
            'fecha' => now(),
            'fecha_reserva' => $this->fecha_reserva,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'estado' => 'SOLICITADO',
            'cliente_id' => $cliente->id,
            'user_id' => auth()->id(),
            'area_id' => $this->selectedAreaId,
        ]);

        $bitacora = new Bitacora();
        $bitacora->accion = '+++SOLICITUD RESERVA';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        $this->emit('crear', '¡Solicitud de reserva exitosa!');
        // Limpiamos los campos después de reservar
        $this->selectedAreaId = null;
        $this->fecha_reserva = $this->hora_inicio = $this->hora_fin = $this->nombre = $this->paterno = $this->materno = $this->ciudad = $this->sexo = $this->telefono = null;

        // Puedes agregar aquí una redirección o un mensaje de éxito si lo deseas.
    }

    public function render()
    {
        return view('livewire.reservar-areas');
    }
}
