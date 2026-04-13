<?php
namespace App\Http\Controllers;
use App\Models\Plato;
use Illuminate\Http\Request;
class PlatoController extends Controller
{
    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', compact('platos'));
    }
    public function create()
    {
        return view('platos.create');
    }
    public function store(Request $request)
    {
        Plato::create($request->all());
        return redirect()->route('platos.index');
    }
    public function show(Plato $plato)
    {
        return "hola desde show";
    }
    public function edit(Plato $plato)
    {
        return view('platos.edit', compact('plato'));
    }
    public function update(Request $request, Plato $plato)
    {
       $plato->update($request->all());
       return redirect()->route('platos.index');
    }
    public function destroy(Plato $plato)
    {
        $plato->delete();
        return redirect()->route('platos.index');
    }
}