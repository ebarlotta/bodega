<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pileta;

class PiletaController extends Controller
{
    public $piletas;
    public $estado;
    public $capacidad;
    public $nropileta;
    public $activo;

    public function index()
    {
        $piletas = Pileta::all();
        return view('piletas.index', compact('piletas'));
    }

    public function create()
    {
        return view('piletas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nropileta' => 'required|integer',
            'capacidad' => 'required|integer',
            'estado' => 'required',
            'activo' => 'required',
        ]);
        
        $pileta = new Pileta;
        $pileta->nropileta = $request->nropileta;
        $pileta->capacidad = $request->capacidad;
        $pileta->estado = $request->estado;
        $pileta->activo = $request->activo;
        $pileta->save();

        $piletas = Pileta::all();
        return redirect()->route('piletas.index')->with('estado','Alta Exitosa!');
        // return view('piletas.index', compact('piletas'))->with('estado','AltaExitosa!');
    }

    public function edit($id)
    {
        $pileta = Pileta::find($id);

        return view ('piletas.edit', compact('pileta'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nropileta' => 'required|integer',
            'capacidad' => 'required|integer',
            'estado' => 'required',
            'activo' => 'required',
        ]);

        $pileta = Pileta::find($id);
        $pileta->nropileta = $request->nropileta;
        $pileta->capacidad = $request->capacidad;
        $pileta->estado = $request->estado;
        $pileta->activo = $request->activo;
        $pileta->save();
        return redirect()->route('piletas.index')->with('estado','Modificacion Exitosa!');
    }

    public function destroy($id)
    {
        $pileta = Pileta::find($id);
        $pileta->delete();

        return redirect()->route('piletas.index')->with('estado','Eliminado!');
    }
}
