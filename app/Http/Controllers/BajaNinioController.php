<?php

namespace App\Http\Controllers;

use App\Models\BajaNinio;
use Illuminate\Http\Request;

class BajaNinioController extends Controller
{
    /**
     * Muestra la lista de todas las bajas.
     */
    public function index()
    {
        // Consultamos todos los registros de la tabla baja_ninios
        $bajas = BajaNinio::all(); 
        
        // Enviamos la variable 'bajas' a la vista index
        return view('baja_ninios.index', compact('bajas'));
    }

    /**
     * Muestra el formulario para crear una nueva baja.
     */
    public function create()
    {
        return view('baja_ninios.create');
    }

    /**
     * Guarda una nueva baja en la base de datos.
     */
    public function store(Request $request)
    {
        // Validamos y creamos el registro con los datos del formulario
        BajaNinio::create($request->all());
        
        // Redirigimos al usuario a la lista principal
        return redirect()->route('baja_ninios.index');
    }

    /**
     * Muestra el detalle de una baja específica (opcional).
     */
    public function show(BajaNinio $bajaNinio)
    {
        return "Detalle de la baja: " . $bajaNinio->id_baja;
    }

    /**
     * Muestra el formulario para editar una baja existente.
     */
    public function edit($id)
    {
        // Buscamos el registro por su ID (id_baja)
        $baja = BajaNinio::findOrFail($id);
        
        // Enviamos la variable 'baja' a la vista edit
        return view('baja_ninios.edit', compact('baja'));
    }

    /**
     * Actualiza el registro en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Buscamos el registro y lo actualizamos con los nuevos datos
        $baja = BajaNinio::findOrFail($id);
        $baja->update($request->all());
        
        return redirect()->route('baja_ninios.index');
    }

    /**
     * Elimina una baja de la base de datos.
     */
    public function destroy($id)
    {
        // Buscamos el registro por su ID y lo borramos
        $baja = BajaNinio::findOrFail($id);
        $baja->delete();
        
        return redirect()->route('baja_ninios.index');
    }
}