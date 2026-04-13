<?php
namespace App\Http\Controllers;
use App\Models\Ninio;
use Illuminate\Http\Request;
class NinioController extends Controller
{
    public function index()
{
    $ninios = Ninio::all(); // Le agregamos la 's' aquí
    return view('ninios.index', compact('ninios')); // Ahora sí coinciden
}
    public function create()
    {
        return view('ninios.create');
    }
    public function store(Request $request)
    {
        Ninio::create($request->all());
        return redirect()->route('ninios.index');
    }
    public function show(Ninio $ninio)
    {
        return "hola desde show";
    }
    public function edit(Ninio $ninio)
    {
        return view('ninios.edit', compact('ninio'));
    }
    public function update(Request $request, Ninio $ninio)
    {
       $ninio->update($request->all());
       return redirect()->route('ninios.index');
    }
    public function destroy(Ninio $ninio)
    {
        $ninio->delete();
        return redirect()->route('ninios.index');
    }
}