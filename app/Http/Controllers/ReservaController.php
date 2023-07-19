<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return view('reservar.index');
    }

    public function mostrarc(){
        return view('reservar.bookings');
    }
}
