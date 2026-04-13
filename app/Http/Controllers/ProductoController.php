<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
    // Esto trae todos los productos de la base de datos
    $productos = \App\Models\Producto::all();
    return view('productos.index', compact('productos'));
    }

    public function create()
    {
    // Esto solo muestra el formulario para escribir
    return view('productos.create');
    }
    public function store(Request $request)
    {
    // Esto toma lo que el estudiante escribió y lo guarda
    \App\Models\Producto::create($request->all());

    // Esto regresa al estudiante a la lista de productos
    return redirect()->route('productos.index');
    }
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}