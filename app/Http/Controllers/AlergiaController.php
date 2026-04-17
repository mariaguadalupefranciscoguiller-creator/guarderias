<?php

namespace App\Http\Controllers;

use App\Models\Alergia;
use App\Models\Ingrediente;
use App\Models\Ninio;
use Illuminate\Http\Request;

class AlergiaController extends Controller
{
    public function index()
    {
        // Unimos alergias con ingredientes y niños para ver nombres
        $alergias = Alergia::join('ingredientes', 'alergias.id_ingrediente', '=', 'ingredientes.id_ingrediente')
            ->join('ninios', 'alergias.id_ninio', '=', 'ninios.id_ninio')
            ->join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select(
                'alergias.id_alergia', // La clave 1, 2, 3...
                'ingredientes.nombre as nombre_ingrediente',
                'personas.nombre as nombre_ninio'
            )
            ->get();

        return view('alergias.index', compact('alergias'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select('ninios.id_ninio', 'personas.nombre')
            ->get();
        return view('alergias.create', compact('ingredientes', 'ninios'));
    }

    public function store(Request $request)
    {
        Alergia::create($request->all());
        return redirect()->route('alergias.index');
    }

    public function edit($id)
    {
        $alergia = Alergia::where('id_alergia', $id)->firstOrFail();
        $ingredientes = Ingrediente::all();
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select('ninios.id_ninio', 'personas.nombre')
            ->get();
        return view('alergias.edit', compact('alergia', 'ingredientes', 'ninios'));
    }

    public function update(Request $request, $id)
    {
        $alergia = Alergia::where('id_alergia', $id)->firstOrFail();
        $alergia->update($request->all());
        return redirect()->route('alergias.index');
    }

    public function destroy($id)
    {
        $alergia = Alergia::where('id_alergia', $id)->firstOrFail();
        $alergia->delete();
        return redirect()->route('alergias.index');
    }
}