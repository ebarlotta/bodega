<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public $almacenes;
    public $estado;

    public function index()
    {
        $almacenes = Almacen::all();
        return view('almacenes.index', compact('almacenes'));
    }

    public function create()
    {
        return view('almacenes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'activo' => 'required',
        ]);
        
        $almacen = new Almacen;
        $almacen->descripcion = $request->descripcion;
        $almacen->activo = $request->activo;
        $almacen->save();

        $almacenes = Almacen::all();
        return redirect()->route('almacenes.index')->with('estado','Alta Exitosa!');
        // return view('almacenes.index', compact('almacenes'))->with('estado','AltaExitosa!');
    }

    public function edit($id)
    {
        $almacen = Almacen::find($id);

        return view ('almacenes.edit', compact('almacen'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'descripcion' => 'required',
            'activo' => 'required',
        ]);

        $almacen = Almacen::find($id);
        $almacen->descripcion = $request->descripcion;
        $almacen->activo = $request->activo;
        $almacen->save();
        return redirect()->route('almacenes.index')->with('estado','Modificacion Exitosa!');
    }

    public function destroy($id)
    {
        $almacen = Almacen::find($id);
        $almacen->delete();

        return redirect()->route('almacenes.index')->with('estado','Eliminado!');
    }
}
