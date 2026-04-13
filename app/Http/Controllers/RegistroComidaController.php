<?php

namespace App\Http\Controllers;

use App\Models\RegistroComida;
use Illuminate\Http\Request;

class RegistroComidaController extends Controller
{
    public function index()
    {
        $registros = RegistroComida::all();
        return view('registro_comidas.index', compact('registros'));
    }

    public function create()
    {
        return view('registro_comidas.create');
    }

    public function store(Request $request)
    {
        RegistroComida::create($request->all());
        return redirect()->route('registro_comidas.index');
    }

    public function show($id)
    {
        return "hola desde show";
    }

    // Usamos ($id) para evitar errores de búsqueda en MariaDB
    public function edit($id)
    {
        $registro = RegistroComida::findOrFail($id);
        return view('registro_comidas.edit', compact('registro'));
    }

    public function update(Request $request, $id)
    {
       $registro = RegistroComida::findOrFail($id);
       $registro->update($request->all());
       return redirect()->route('registro_comidas.index');
    }

    public function destroy($id)
    {
        // Buscamos por ID para que la eliminación sea segura
        $registro = RegistroComida::findOrFail($id);
        $registro->delete();
        
        return redirect()->route('registro_comidas.index');
    }
}