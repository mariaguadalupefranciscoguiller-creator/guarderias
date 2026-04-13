<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    // Esto le dice a Laravel que NO busque las columnas created_at y updated_at
    public $timestamps = false;

    // Asegúrate de tener también esto para que te deje guardar los datos
    protected $table = 'encargados';
    protected $primaryKey = 'id_encargado';
    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno'];
}