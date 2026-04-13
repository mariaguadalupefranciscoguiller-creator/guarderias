<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiares'; // Asegúrate de que este sea el nombre en tu DB
    protected $primaryKey = 'id_familiar';
    protected $fillable = [
        'id_persona',
        'DNI',
        'direccion',
        'id_parentezco',
        'id_ninio'
    ];
    public $timestamps = false;
}