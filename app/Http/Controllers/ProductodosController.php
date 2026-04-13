<?php

namespace App\Http\Controllers;

use App\Models\Productodos;
use Illuminate\Http\Request;

class ProductodosController extends Controller
{
    public function index()
    {
        $productosdos = Productodos::all();
        return view('productosdos.index', compact('productosdos'));
    }

    public function create()
    {
        return view('productosdos.create');
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