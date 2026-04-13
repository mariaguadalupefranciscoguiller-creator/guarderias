<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ninio extends Model
{
    protected $table = 'ninios'; 
    protected $primaryKey = 'id_ninio';

    // Desactivamos los tiempos para que no te dé el error de 'updated_at'
    public $timestamps = false;

    protected $fillable = [
        'matricula',
        'fecha',
        'id_persona',
        'id_centro'
    ];
}