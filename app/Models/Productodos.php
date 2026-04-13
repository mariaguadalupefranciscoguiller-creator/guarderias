<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productodos extends Model
{
    protected $table = 'productodos'; 
    protected $primaryKey = 'id_producto';
    
    // Columnas que permitimos editar
    protected $fillable = [
        "nombre",
        "cantidad_existencia",
        "fecha_entrada",
        "unidad_medida",
        "id_categoria"
    ];
    
    // IMPORTANTE: Desactivado porque borramos created_at y updated_at
    public $timestamps = false; 
}