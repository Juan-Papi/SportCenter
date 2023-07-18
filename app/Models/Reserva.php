<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion de uno a muchos inversa
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    //relacion de uno a muchos inversa
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    //relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
