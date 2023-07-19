<?php

namespace App\Http\Livewire;

use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReserva extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $reservas = Reserva::orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.admin-reserva', compact('reservas'));
    }
}
