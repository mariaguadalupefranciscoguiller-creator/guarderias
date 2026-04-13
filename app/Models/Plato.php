<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Plato extends Model
{
    protected $table = 'platos';
    protected $primaryKey = 'id_plato';
    protected $fillable = ['nombre', 'precio'];
    public $timestamps = false; 
}