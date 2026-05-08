<?php

namespace App\Http\Controllers;
use App\Models\Productodos;
use App\Models\Encargado;
use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        // Unimos la tabla entradas con productos y encargados
        $entradas = \App\Models\Entrada::leftJoin('productodos', 'entradas.id_producto', '=', 'productodos.id_producto')
            ->leftJoin('encargados', 'entradas.id_encargado', '=', 'encargados.id_encargado')
            ->select(
                'entradas.id_entrada',
                'entradas.fecha_entrada', // Nombre exacto de tu DB
                'entradas.cantidad_entrada', // Nombre exacto de tu DB
                'productodos.nombre as producto_nom',
                'encargados.nombre as encargado_nom'
            )
            ->get();

        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        // Necesitamos los productos y encargados para que salgan en las listas (selects)
        $productos = \App\Models\Productodos::all();
        $encargados = \App\Models\Encargado::all();
        return view('entradas.create', compact('productos', 'encargados'));
    }
    public function store(Request $request)
    {
        // AQUÍ ESTABA EL ERROR: Necesitamos esta línea para que guarde de verdad
        Entrada::create($request->all());
        
        return redirect()->route('entradas.index'); 
    }

    // Nota: Eliminamos la función 'show' ya que no tienes la vista creada.
    // Así evitamos el error 404 al intentar entrar a entradas/1

    public function edit($id)
    {
        // Buscamos la entrada que queremos editar
        $entrada = \App\Models\Entrada::findOrFail($id);
        
        // Traemos todos los productos y encargados para llenar los selectores
        $productos = \App\Models\Productodos::all();
        $encargados = \App\Models\Encargado::all();

        return view('entradas.edit', compact('entrada', 'productos', 'encargados'));
    }

    public function update(Request $request, $id)
    {
        $entrada = \App\Models\Entrada::findOrFail($id);
        
        // Actualizamos usando los nombres exactos de tu base de datos
        $entrada->update([
            'fecha_entrada'    => $request->fecha_entrada,
            'cantidad_entrada' => $request->cantidad_entrada,
            'id_producto'      => $request->id_producto,
            'id_encargado'     => $request->id_encargado,
        ]);

        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada correctamente');
    }

    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return redirect()->route('entradas.index');
    }
}