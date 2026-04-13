<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parentezco extends Model
{
    protected $table = 'parentezcos';
    protected $primaryKey = 'id_parentezco'; // Asegúrate de que este sea tu ID
    
    protected $fillable = ['nombre'];

    // ESTA ES LA LÍNEA QUE ARREGLA EL ERROR:
    public $timestamps = false; 
}