<?php

namespace App\Http\Controllers;
use App\Models\Productodos;
use App\Models\Salida;
use App\Models\Encargado;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        // Unimos salidas con productos y encargados para ver los nombres reales
        $salidas = \App\Models\Salida::leftJoin('productodos', 'salidas.id_producto', '=', 'productodos.id_producto')
            ->leftJoin('encargados', 'salidas.id_encargado', '=', 'encargados.id_encargado')
            ->select(
                'salidas.*', 
                'productodos.nombre as producto_nom', 
                'encargados.nombre as encargado_nom'
            )
            ->get();

        return view('salidas.index', compact('salidas'));
    }

    public function create()
    {
        $productos = \App\Models\Productodos::all();
        $encargados = \App\Models\Encargado::all();
        return view('salidas.create', compact('productos', 'encargados'));
    }

    public function edit($id)
    {
        $salida = \App\Models\Salida::findOrFail($id);
        $productos = \App\Models\Productodos::all();
        $encargados = \App\Models\Encargado::all();
        return view('salidas.edit', compact('salida', 'productos', 'encargados'));
    }
    public function store(Request $request)
    {
        Salida::create($request->all());
        return redirect()->route('salidas.index');
    }
    public function show(Salida $salida)
    {
        return "hola desde show";
    }
    public function update(Request $request, Salida $salida)
    {
       $salida->update($request->all());
       return redirect()->route('salidas.index');
    }
    public function destroy(Salida $salida)
    {
        $salida->delete();
        return redirect()->route('salidas.index');
    }
    
}
