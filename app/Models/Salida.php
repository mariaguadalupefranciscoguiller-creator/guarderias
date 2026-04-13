<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Salida extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'salidas';
    protected $primaryKey = 'id_salida';
    protected $fillable = [
        'fecha_salida',
        'cantidad_salida',
        'id_producto',
        'id_encargado'
    ];
}
