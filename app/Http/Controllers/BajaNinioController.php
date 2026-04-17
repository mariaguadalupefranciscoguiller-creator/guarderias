<?php

namespace App\Http\Controllers;

use App\Models\BajaNinio;
use App\Models\Ninio;
use Illuminate\Http\Request;

class BajaNinioController extends Controller
{
    /**
     * Muestra la lista de todas las bajas con el nombre del niño.
     */
    public function index()
    {
        // Hacemos join con ninios y personas para sacar el nombre
        $bajas = BajaNinio::join('ninios', 'baja_ninios.id_ninio', '=', 'ninios.id_ninio')
            ->join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select(
                'baja_ninios.id_baja',
                'baja_ninios.motivo',
                'baja_ninios.fecha',
                'personas.nombre as nombre_ninio' // Traemos el nombre real
            )
            ->get();
            
        return view('baja_ninios.index', compact('bajas'));
    }

    /**
     * Muestra el formulario para crear una nueva baja.
     */
    public function create()
    {
        // Traemos los niños con sus nombres para el select del formulario
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select('ninios.id_ninio', 'personas.nombre')
            ->get();

        return view('baja_ninios.create', compact('ninios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ninio' => 'required',
            'motivo' => 'required',
            'fecha' => 'required'
        ]);

        BajaNinio::create($request->all());
        
        return redirect()->route('baja_ninios.index')
            ->with('success', 'Baja registrada correctamente');
    }

    public function edit($id)
    {
        $baja = BajaNinio::findOrFail($id);
        
        // También necesitamos la lista de niños aquí para el select
        $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->select('ninios.id_ninio', 'personas.nombre')
            ->get();
            
        return view('baja_ninios.edit', compact('baja', 'ninios'));
    }

    public function update(Request $request, $id)
    {
        $baja = BajaNinio::findOrFail($id);
        $baja->update($request->all());
        
        return redirect()->route('baja_ninios.index')
            ->with('success', 'Baja actualizada correctamente');
    }

    public function destroy($id)
    {
        $baja = BajaNinio::findOrFail($id);
        $baja->delete();
        
        return redirect()->route('baja_ninios.index')
            ->with('success', 'Baja eliminada correctamente');
    }
}