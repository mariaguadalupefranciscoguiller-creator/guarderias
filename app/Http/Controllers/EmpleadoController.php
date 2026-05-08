<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado; // Asegúrate de que el modelo se llame así

class EmpleadoController extends Controller
{
    // Listado de empleados
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    // ESTA ES LA FUNCIÓN QUE TE FALTA
    public function create()
    {
        return view('empleados.create');
    }

    // Para guardar el nuevo empleado
    public function store(Request $request)
    {
        Empleado::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'puesto'           => $request->puesto,
        ]);

        return redirect()->route('empleados.index')->with('success', 'Empleado registrado');
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}