<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado;

class EncargadoController extends Controller
{
    public function index()
    {
        $encargados = Encargado::all();
        return view('encargados.index', compact('encargados'));
    }

    public function create()
    {
        return view('encargados.create');
    }

    public function store(Request $request)
    {
        Encargado::create($request->all());
        return redirect()->route('encargados.index');
    }
    public function edit($id)
    {
        $encargado = Encargado::findOrFail($id);
        return view('encargados.edit', compact('encargado'));
    }

    public function update(Request $request, $id)
    {
        $encargado = Encargado::findOrFail($id);
        $encargado->update($request->all());
        return redirect()->route('encargados.index');
    }

    public function destroy($id)
    {
        $encargado = Encargado::findOrFail($id);
        $encargado->delete();
        return redirect()->route('encargados.index');
    }
}