<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use Illuminate\Http\Request;

class AbonoController extends Controller
{
    public function index() {
        $abonos = Abono::all();
        return view('abonos.index', compact('abonos'));
    }

    public function create() {
        return view('abonos.create');
    }

    public function store(Request $request) {
        Abono::create($request->all());
        return redirect()->route('abonos.index');
    }

    public function edit($id) {
        $abono = Abono::findOrFail($id);
        return view('abonos.edit', compact('abono'));
    }

    public function update(Request $request, $id) {
        $abono = Abono::findOrFail($id);
        $abono->update($request->all());
        return redirect()->route('abonos.index');
    }

    public function destroy($id) {
        $abono = Abono::findOrFail($id);
        $abono->delete();
        return redirect()->route('abonos.index');
    }
}