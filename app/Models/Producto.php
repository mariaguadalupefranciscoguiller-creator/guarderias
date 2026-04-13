<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Aquí es donde el estudiante da permiso para guardar datos
    protected $fillable = ['nombre', 'precio'];
}
