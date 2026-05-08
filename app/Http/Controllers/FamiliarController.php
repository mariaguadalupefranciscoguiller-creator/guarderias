<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Persona;
use App\Models\Parentezco;
use App\Models\Ninio;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    public function index()
{
    $familiares = Familiar::leftJoin('ninios', 'familiares.id_ninio', '=', 'ninios.id_ninio')
        ->leftJoin('personas as p_ninio', 'ninios.id_persona', '=', 'p_ninio.id_persona')
        ->leftJoin('personas as p_familiar', 'familiares.id_persona', '=', 'p_familiar.id_persona')
        ->leftJoin('parentezcos', 'familiares.id_parentezco', '=', 'parentezcos.id_parentezco')
        ->select(
            'familiares.*', // Esto debería traer el DNI si está en la tabla familiares
            'p_ninio.nombre as ninio_nom',
            'p_familiar.nombre as familiar_nom',
            'parentezcos.nombre as parentesco_nom'
        )
        ->get();

    return view('familiares.index', compact('familiares'));
}

    public function create()
{
    $personas = Persona::all(); 
    $parentescos = Parentezco::all();
    $ninios = Ninio::join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
        ->select('ninios.id_ninio', 'personas.nombre')
        ->get();
    return view('familiares.create', compact('personas', 'parentescos', 'ninios'));
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
        $parentezcos = Parentezco::all();
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