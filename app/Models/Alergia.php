<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Alergia extends Model
{
    protected $table = 'alergias'; 
    protected $primaryKey = 'id_alergia';
    protected $fillable = [
        'id_ingrediente',
        'id_ninio'
    ];
    public $timestamps = false;
}