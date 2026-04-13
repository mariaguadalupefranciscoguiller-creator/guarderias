<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::all();
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        return view('entradas.create');
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
        $entrada = Entrada::findOrFail($id);
        return view('entradas.edit', compact('entrada'));
    }

    public function update(Request $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->update($request->all());
        return redirect()->route('entradas.index');
    }

    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return redirect()->route('entradas.index');
    }
}