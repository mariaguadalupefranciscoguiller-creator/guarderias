<?php
namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;
class PersonaController extends Controller
{
    public function index()
{
    // Traemos todos los datos con los nombres reales de tu tabla
    $personas = Persona::all(); 
    return view('personas.index', compact('personas'));
}
    public function create()
    {
        return view('personas.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        Persona::create($request->all());
        return redirect()->route('personas.index');
    }
    public function show(Persona $persona)
    {
        return "hola desde show";
    }
    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }
    public function update(Request $request, Persona $persona)
    {
       $persona->update($request->all());
       return redirect()->route('personas.index');
    }
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index');
    }
}