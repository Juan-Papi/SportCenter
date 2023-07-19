<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Bookings extends Component
{
    public function render()
    {
        $reservas = auth()->user()->reservas;
        return view('livewire.bookings', compact('reservas'));
    }
}
