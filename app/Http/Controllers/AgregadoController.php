<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agregado;
use App\Models\Unidad;

class AgregadoController extends Controller
{
    public $fecha;
    public $descripcion;
    public $anio;
    public $activo;
    public $selected='';

    public function index()
    {
        $agregados = Agregado::all();
        return view('agregados.index', compact('agregados'));
    }

    public function create()
    {
        $unidades = Unidad::all();
        return view('agregados.create', compact('unidades'));
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required',
            'anio' => 'required',
            'activo' => 'required',
        ]);
        
        $agregado = new Agregado;
        $agregado->fecha = $request->fecha;
        $agregado->descripcion = $request->descripcion;
        $agregado->anio = $request->anio;
        $agregado->unidad_id = $request->unidad_id;
        $agregado->activo = $request->activo;
        $agregado->save();

        $agregados = Agregado::all();
        return redirect()->route('agregados.index')->with('estado','Alta Exitosa!');
        // return view('agregados.index', compact('agregados'))->with('estado','AltaExitosa!');
    }

    public function edit($id)
    {
        $agregado = Agregado::find($id);
        $unidades = Unidad::all();
        $selected = $this->selected;
        return view ('agregados.edit', compact('agregado','unidades','selected'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required',
            'anio' => 'required',
            'activo' => 'required',
        ]);

        $agregado = Agregado::find($id);
        $agregado->fecha = $request->fecha;
        $agregado->descripcion = $request->descripcion;
        $agregado->anio = $request->anio;
        $agregado->unidad_id = $request->unidad_id;
        $agregado->activo = $request->activo;
        $agregado->save();
        return redirect()->route('agregados.index')->with('estado','Modificacion Exitosa!');
    }

    public function destroy($id)
    {
        $agregado = Agregado::find($id);
        $agregado->delete();

        return redirect()->route('agregados.index')->with('estado','Eliminado!');
    }
}
