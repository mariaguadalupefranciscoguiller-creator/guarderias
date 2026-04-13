<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroComida extends Model
{
    protected $table = 'registro_comidas'; 
    protected $primaryKey = 'id_registro_comida';

    // Desactivamos los tiempos para evitar errores de columnas no encontradas
    public $timestamps = false;

    protected $fillable = [
        'id_ninio',
        'id_plato',
        'fecha',
        'cantidad'
    ];
}
