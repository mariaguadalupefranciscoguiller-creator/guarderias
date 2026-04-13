<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroCuenta extends Model
{
    protected $table = 'registro_cuentas'; 
    protected $primaryKey = 'id_registro_cuenta';

    // Desactivamos los timestamps para evitar el error de 'updated_at'
    public $timestamps = false;

    protected $fillable = [
        'id_familiar',
        'cuenta'
    ];
}