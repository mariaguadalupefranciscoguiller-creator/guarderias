<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Productodos;
use Illuminate\Http\Request;

class ProductodosController extends Controller
{
    public function index()
    {
        $productodos = \App\Models\Productodos::leftJoin('categorias', 'productodos.id_categoria', '=', 'categorias.id_categoria')
            ->select(
                'productodos.*', 
                // Intentamos con 'nombre_categoria', si en tu DB es 'nombre', cámbialo aquí
                'categorias.nombre_categoria as categoria_nom' 
            )
            ->get();

        return view('productosdos.index', compact('productodos'));
    }
    public function create()
    {
    // Traemos todas las categorías de la base de datos
    $categorias = \App\Models\Categoria::all(); 
    
    return view('productosdos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        Productodos::create($request->all());
        return redirect()->route('productosdos.index');
    }

    // Función corregida para EDITAR
    public function edit($id)
    {
        $productodos = Productodos::findOrFail($id); 
        return view('productosdos.edit', compact('productodos'));
    }

    // Función corregida para GUARDAR CAMBIOS
    public function update(Request $request, $id)
    {
        $producto = Productodos::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('productosdos.index');
    }

    // Función corregida para BORRAR
    public function destroy($id)
    {
        $producto = Productodos::findOrFail($id);
        $producto->delete();
        return redirect()->route('productosdos.index');
    }
}