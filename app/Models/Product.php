<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion de uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, "imageable");
    }
}
