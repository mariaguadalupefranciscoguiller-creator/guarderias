<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';
    
    // Indicamos que nuestra llave no se llama "id"
    protected $primaryKey = 'id_entrada';

    // Desactivamos las columnas created_at y updated_at
    public $timestamps = false;

    protected $fillable = [
        'fecha_entrada',
        'cantidad_entrada',
        'id_producto',
        'id_encargado'
    ];
}