<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id_persona'; // O el nombre de tu llave primaria

    // ESTA ES LA LÍNEA QUE DEBES AGREGAR:
    public $timestamps = false; 

    protected $fillable = [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'fecha_nacimiento'
    ];
}