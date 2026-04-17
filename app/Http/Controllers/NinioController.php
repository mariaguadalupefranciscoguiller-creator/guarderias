<?php

namespace App\Http\Controllers;

use App\Models\Ninio;
use App\Models\Persona;
use App\Models\Centro;
use Illuminate\Http\Request;

class NinioController extends Controller
{
    public function index()
    {
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->join('centros', 'ninios.id_centro', '=', 'centros.id_centro')
            ->select(
                'ninios.id_ninio', 
                'ninios.matricula', 
                'ninios.fecha', 
                'personas.nombre as nombre_ninio', 
                'centros.nombre as nombre_centro'
            )
            ->get();

        return view('ninios.index', compact('ninios'));
    }

    public function create()
    {
        $personas = Persona::all();
        $centros = Centro::all();
        return view('ninios.create', compact('personas', 'centros'));
    }

    public function store(Request $request)
    {
        Ninio::create($request->all());
        return redirect()->route('ninios.index');
    }

    public function edit(Ninio $ninio)
    {
        $personas = Persona::all();
        $centros = Centro::all();
        return view('ninios.edit', compact('ninio', 'personas', 'centros'));
    }

    public function update(Request $request, Ninio $ninio)
    {
        $ninio->update($request->all());
        return redirect()->route('ninios.index');
    }

    public function destroy(Ninio $ninio)
    {
        $ninio->delete();
        return redirect()->route('ninios.index');
    }
}