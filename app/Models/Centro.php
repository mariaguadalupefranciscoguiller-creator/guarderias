<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_centro'; // Ajusta si tu llave primaria se llama distinto

    // ESTA ES LA LÍNEA CLAVE QUE DEBES AGREGAR:
    public $timestamps = false; 

    protected $fillable = [
        'nombre', 
        'costo'
    ];
}