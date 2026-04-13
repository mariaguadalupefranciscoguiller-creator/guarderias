<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BajaNinio extends Model
{
    // Nombre exacto de tu tabla en PHPMyAdmin
    protected $table = 'baja_ninios'; 
    
    // Tu llave primaria
    protected $primaryKey = 'id_baja';

    // Las columnas que vas a guardar
    protected $fillable = [
        'id_ninio',
        'motivo',
        'fecha'
    ];

    // IMPORTANTE: Desactivamos esto para que no pida created_at ni updated_at
    public $timestamps = false; 
}