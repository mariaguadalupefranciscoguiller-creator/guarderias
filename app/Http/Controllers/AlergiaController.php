<?php
namespace App\Http\Controllers;
use App\Models\Alergia;
use Illuminate\Http\Request;
class AlergiaController extends Controller
{
    public function index()
    {
        $alergias = Alergia::all();
        return view('alergias.index', compact('alergias'));
    }
    public function create()
    {
        return view('alergias.create');
    }
    public function store(Request $request)
    {
        Alergia::create($request->all());
        return redirect()->route('alergias.index');
    }
    public function show(Alergia $alergia)
    {
        return "hola desde show";
    }
    public function edit(Alergia $alergia)
    {
        return view('alergias.edit', compact('alergia'));
    }
    public function update(Request $request, Alergia $alergia)
    {
       $alergia->update($request->all());
       return redirect()->route('alergias.index');
    }
    public function destroy(Alergia $alergia)
    {
        $alergia->delete();
        return redirect()->route('alergias.index');
    }
}
