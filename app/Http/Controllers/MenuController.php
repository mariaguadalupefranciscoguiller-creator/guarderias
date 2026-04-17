<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Muestra el listado de menús con nombres reales.
     */
    public function index()
    {
        $menus = Menu::join('platos', 'menus.id_plato', '=', 'platos.id_plato')
            ->join('ingredientes', 'menus.id_ingrediente', '=', 'ingredientes.id_ingrediente')
            ->select(
                'menus.id_menu',
                'platos.nombre as nombre_plato',
                'ingredientes.nombre as nombre_ingrediente'
            )
            ->get();

        return view('menus.index', compact('menus'));
    }

    /**
     * Formulario para crear nuevo menú.
     */
    public function create()
    {
        $platos = Plato::all();
        $ingredientes = Ingrediente::all();
        return view('menus.create', compact('platos', 'ingredientes'));
    }

    /**
     * Guarda el nuevo registro.
     */
    public function store(Request $request)
    {
        Menu::create($request->all());
        return redirect()->route('menus.index');
    }

    /**
     * Formulario de edición.
     */
    public function edit(Menu $menu)
    {
        $platos = Plato::all();
        $ingredientes = Ingrediente::all();
        return view('menus.edit', compact('menu', 'platos', 'ingredientes'));
    }

    /**
     * Actualiza el registro.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());
        return redirect()->route('menus.index');
    }

    /**
     * Elimina el registro.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index');
    }
}