<?php

namespace App\Http\Controllers;

use App\Models\RegistroCuenta;
use Illuminate\Http\Request;

class RegistroCuentaController extends Controller
{
    public function index()
    {
        $cuentas = RegistroCuenta::all();
        return view('registro_cuentas.index', compact('cuentas'));
    }

    public function create()
    {
        return view('registro_cuentas.create');
    }

    public function store(Request $request)
    {
        RegistroCuenta::create($request->all());
        return redirect()->route('registro_cuentas.index');
    }

    public function show($id)
    {
        return "hola desde show";
    }

    public function edit($id)
    {
        $cuenta = RegistroCuenta::findOrFail($id);
        return view('registro_cuentas.edit', compact('cuenta'));
    }

    public function update(Request $request, $id)
    {
       $cuenta = RegistroCuenta::findOrFail($id);
       $cuenta->update($request->all());
       return redirect()->route('registro_cuentas.index');
    }

    public function destroy($id)
    {
        $cuenta = RegistroCuenta::findOrFail($id);
        $cuenta->delete();
        return redirect()->route('registro_cuentas.index');
    }
}