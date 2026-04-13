<?php
namespace App\Http\Controllers;
use App\Models\Encargado;
use Illuminate\Http\Request;

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
    public function show(Encargado $encargado)
    {
        return "hola desde show";
    }
    public function edit(Encargado $encargado)
    {
        return view('encargados.edit', compact('encargado'));
    }
    public function update(Request $request, Encargado $encargado)
    {
       $encargado->update($request->all());
       return redirect()->route('encargados.index');
    }
    public function destroy(Encargado $encargado)
    {
        $encargado->delete();
        return redirect()->route('encargados.index');
    }
    
}