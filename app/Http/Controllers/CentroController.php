<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Traemos todos los centros de la base de datos
        $centros = Centro::all(); 
        return view('centros.index', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('centros.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Centro::create($request->all());
        return redirect()->route('centros.index');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Centro $centro)
    {
        return "hola desde show";

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centro $centro)
    {
        //dd($centro);
        return view('centros.edit', compact('centro'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centro $centro)
    {
       $centro->update($request->all());

       return redirect()->route('centros.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        //dd($centro);
        $centro->delete();
        return redirect()->route('centros.index');

        //
    }
}