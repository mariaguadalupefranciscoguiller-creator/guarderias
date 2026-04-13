<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $table = 'abonos';
    protected $primaryKey = 'id_abono';
    
    // Nombres exactos de tu base de datos
    protected $fillable = [
        'cantidad',
        'fecha',
        'id_registro_cuenta'
    ];
    
    public $timestamps = false;
}