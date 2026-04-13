<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    protected $table = 'menus'; // Nombre de tu tabla en la DB
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'id_plato',
        'id_ingrediente'
    ];
    public $timestamps = false;
}