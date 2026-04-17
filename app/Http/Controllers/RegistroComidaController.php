<?php

namespace App\Http\Controllers;

use App\Models\RegistroComida;
use App\Models\Ninio;
use App\Models\Plato;
use Illuminate\Http\Request;

class RegistroComidaController extends Controller
{
    public function index()
{
    $registros = RegistroComida::join('ninios', 'registro_comidas.id_ninio', '=', 'ninios.id_ninio')
        ->join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
        ->join('platos', 'registro_comidas.id_plato', '=', 'platos.id_plato')
        ->select(
            'registro_comidas.id_registro_comida', // ESTA ES LA CLAVE 1, 2, 3...
            'registro_comidas.fecha',
            'registro_comidas.cantidad', 
            'personas.nombre as nombre_ninio',
            'platos.nombre as nombre_plato'
        )
        ->get();

    return view('registro_comidas.index', compact('registros'));
}

    public function create()
    {
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select('ninios.id_ninio', 'personas.nombre')
            ->get();
        $platos = Plato::all();
        return view('registro_comidas.create', compact('ninios', 'platos'));
    }

    public function store(Request $request)
    {
        RegistroComida::create($request->all());
        return redirect()->route('registro_comidas.index');
    }

    public function edit($id)
    {
        $registro = RegistroComida::where('id_registro_comida', $id)->firstOrFail();
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select('ninios.id_ninio', 'personas.nombre')
            ->get();
        $platos = Plato::all();
        return view('registro_comidas.edit', compact('registro', 'ninios', 'platos'));
    }

    public function update(Request $request, $id)
    {
        $registro = RegistroComida::where('id_registro_comida', $id)->firstOrFail();
        $registro->update($request->all());
        return redirect()->route('registro_comidas.index');
    }

    public function destroy($id)
    {
        $registro = RegistroComida::where('id_registro_comida', $id)->firstOrFail();
        $registro->delete();
        return redirect()->route('registro_comidas.index');
    }
}