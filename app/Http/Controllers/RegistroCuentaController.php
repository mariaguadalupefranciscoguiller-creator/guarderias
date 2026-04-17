<?php

namespace App\Http\Controllers;

use App\Models\RegistroCuenta;
use App\Models\Familiar;
use App\Models\Persona;
use Illuminate\Http\Request;

class RegistroCuentaController extends Controller
{
    public function index()
{
    $cuentas = RegistroCuenta::join('familiares', 'registro_cuentas.id_familiar', '=', 'familiares.id_familiar')
        ->join('personas', 'familiares.id_persona', '=', 'personas.id_persona')
        ->select(
            'registro_cuentas.id_registro_cuenta', 
            'registro_cuentas.cuenta', // Aquí corregimos el nombre según tu imagen
            'personas.nombre as nombre_familiar'
        )
        ->get();

    return view('registro_cuentas.index', compact('cuentas'));
}

    /**
     * Formulario para nueva cuenta.
     */
    public function create()
    {
        $familiares = Familiar::join('personas', 'familiares.id_persona', '=', 'personas.id_persona')
            ->select('familiares.id_familiar', 'personas.nombre')
            ->get();
        return view('registro_cuentas.create', compact('familiares'));
    }

    public function store(Request $request)
    {
        RegistroCuenta::create($request->all());
        return redirect()->route('registro_cuentas.index');
    }

    public function edit($id)
    {
        $cuenta = RegistroCuenta::where('id_registro_cuenta', $id)->firstOrFail();
        $familiares = Familiar::join('personas', 'familiares.id_persona', '=', 'personas.id_persona')
            ->select('familiares.id_familiar', 'personas.nombre')
            ->get();
        return view('registro_cuentas.edit', compact('cuenta', 'familiares'));
    }

    public function update(Request $request, $id)
    {
        $cuenta = RegistroCuenta::where('id_registro_cuenta', $id)->firstOrFail();
        $cuenta->update($request->all());
        return redirect()->route('registro_cuentas.index');
    }

    public function destroy($id)
    {
        $cuenta = RegistroCuenta::where('id_registro_cuenta', $id)->firstOrFail();
        $cuenta->delete();
        return redirect()->route('registro_cuentas.index');
    }
}