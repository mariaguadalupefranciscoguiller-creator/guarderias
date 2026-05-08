<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\RegistroCuenta;
use Illuminate\Http\Request;

class AbonoController extends Controller
{
    public function index()
    {
        $abonos = Abono::join("registro_cuentas", "registro_cuentas.id_registro_cuenta", "abonos.id_registro_cuenta")
            ->join("familiares", "familiares.id_familiar", "registro_cuentas.id_familiar")
            ->join("ninios", "ninios.id_ninio", "familiares.id_ninio")
            ->join("personas", "personas.id_persona", "ninios.id_persona")
            ->join("personas as personas_tutor", "personas_tutor.id_persona", "familiares.id_persona")
            ->select(
                "abonos.id_abono",
                "abonos.cantidad",
                "abonos.fecha",
                "personas.nombre as nombre_ninio",
                "personas_tutor.nombre as nombre_tutor",
                "registro_cuentas.cuenta"
            )
            ->get();
   
        return view('abonos.index', compact('abonos'));
    }

    public function create()
    {
        // Traemos las cuentas con el nombre del niño para el select
        $cuentas = RegistroCuenta::join("familiares", "familiares.id_familiar", "registro_cuentas.id_familiar")
            ->join("ninios", "ninios.id_ninio", "familiares.id_ninio")
            ->join("personas", "personas.id_persona", "ninios.id_persona")
            ->select("registro_cuentas.id_registro_cuenta", "personas.nombre as nombre_ninio", "registro_cuentas.cuenta")
            ->get();
        
        return view('abonos.create', compact('cuentas'));
    }

    public function store(Request $request)
    {
        Abono::create($request->all());
        return redirect()->route('abonos.index');
    }

    public function edit(Abono $abono)
    {
        // Traemos nombres reales para el select de edición
        $cuentas = RegistroCuenta::join("familiares", "familiares.id_familiar", "registro_cuentas.id_familiar")
            ->join("ninios", "ninios.id_ninio", "familiares.id_ninio")
            ->join("personas", "personas.id_persona", "ninios.id_persona")
            ->select("registro_cuentas.id_registro_cuenta", "personas.nombre as nombre_ninio", "registro_cuentas.cuenta")
            ->get();

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