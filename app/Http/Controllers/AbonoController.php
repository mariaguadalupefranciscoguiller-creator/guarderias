<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\RegistroCuenta;
use Illuminate\Http\Request;

class AbonoController extends Controller
{
    public function index()
    {
        // El secreto está en estos JOINS. 
        // 1. Unimos abonos con registro_cuentas usando id_registro_cuenta.
        // 2. Unimos registro_cuentas con familiares (ajusta 'id_fam' si el nombre es distinto en tu DB).
        // 3. Unimos familiares con ninios y personas para sacar los nombres reales.
        
        $abonos = Abono::join('registro_cuentas', 'abonos.id_registro_cuenta', '=', 'registro_cuentas.id_registro_cuenta')
            ->join('familiares', 'registro_cuentas.id_registro_cuenta', '=', 'familiares.id_familiar') 
            ->join('ninios', 'familiares.id_ninio', '=', 'ninios.id_ninio')
            ->join('personas', 'ninios.id_persona', '=', 'personas.id_persona')
            ->join('personas as personas_tutor', 'familiares.id_persona', '=', 'personas_tutor.id_persona')
            ->select(
                'abonos.id_abono',
                'abonos.cantidad', 
                'abonos.fecha', 
                'personas.nombre AS nombre_ninio',      // Esto llena la columna "Nombre Nino"
                'personas_tutor.nombre AS nombre_tutor', // Esto llena la columna "Nombre Familiar"
                'registro_cuentas.cuenta'
            )
            ->get();

        return view('abonos.index', compact('abonos'));
    }

    public function create()
    {
        $cuentas = RegistroCuenta::all();
        return view('abonos.create', compact('cuentas'));
    }

    public function store(Request $request)
    {
        Abono::create($request->all());
        return redirect()->route('abonos.index');
    }

    public function edit(Abono $abono)
    {
        $cuentas = RegistroCuenta::all();
        return view('abonos.edit', compact('abono', 'cuentas'));
    }

    public function update(Request $request, Abono $abono)
    {
        $abono->update($request->all());
        return redirect()->route('abonos.index');
    }

    public function destroy(Abono $abono)
    {
        $abono->delete();
        return redirect()->route('abonos.index');
    }
}