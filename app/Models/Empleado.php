<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false; 

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'puesto',
        'id_producto' // <--- AGREGA ESTO AQUÍ
    ];
}