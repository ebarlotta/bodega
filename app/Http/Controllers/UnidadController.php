<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;

class UnidadController extends Controller
{
    public $unidades;
    public $estado;

    public function index()
    {
        $unidades = Unidad::all();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'signo' => 'required',
        ]);
        
        $unidad = new Unidad;
        $unidad->descripcion = $request->descripcion;
        $unidad->signo = $request->signo;
        $unidad->save();

        $unidades = Unidad::all();
        return redirect()->route('unidades.index')->with('estado','Alta Exitosa!');
        // return view('unidades.index', compact('unidades'))->with('estado','AltaExitosa!');
    }

    public function edit($id)
    {
        $unidad = Unidad::find($id);

        return view ('unidades.edit', compact('unidad'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'descripcion' => 'required',
            'signo' => 'required',
        ]);

        $unidad = Unidad::find($id);
        $unidad->descripcion = $request->descripcion;
        $unidad->signo = $request->signo;
        $unidad->save();
        return redirect()->route('unidades.index')->with('estado','Modificacion Exitosa!');
    }

    public function destroy($id)
    {
        $unidad = Unidad::find($id);
        $unidad->delete();

        return redirect()->route('unidades.index')->with('estado','Eliminado!');
    }
}
