<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    public function index()
    {
        $familiares = Familiar::all();
        return view('familiares.index', compact('familiares'));
    }

    public function create()
    {
        return view('familiares.create');
    }

    public function store(Request $request)
    {
        Familiar::create($request->all());
        return redirect()->route('familiares.index');
    }

    public function show($id)
    {
        return "hola desde show";
    }

    // Cambiamos (Familiar $familiar) por ($id) para evitar errores de búsqueda
    public function edit($id)
    {
        $familiar = Familiar::findOrFail($id);
        return view('familiares.edit', compact('familiar'));
    }

    public function update(Request $request, $id)
    {
       $familiar = Familiar::findOrFail($id);
       $familiar->update($request->all());
       return redirect()->route('familiares.index');
    }

    public function destroy($id)
    {
        // Esta es la parte que corregimos para que sí elimine:
        $familiar = Familiar::findOrFail($id);
        $familiar->delete();
        
        return redirect()->route('familiares.index');
    }
}