<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    public $timestamps = false; // Esto apaga las fechas
    protected $table = 'ingredientes';
    protected $primaryKey = 'id_ingrediente';
    protected $fillable = ['nombre'];
}