<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::all();
        return view('salidas.index', compact('salidas'));
    }
    public function create()
    {
        return view('salidas.create');
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
    public function edit(Salida $salida)
    {
        return view('salidas.edit', compact('salida'));
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
