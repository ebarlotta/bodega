<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analisis;
use App\Models\Pileta;

class AnalisisController extends Controller
{
    public $analisis;

    public function index()
    {
        $analisis = Analisis::orderBy('FechaAnalisis', 'DESC')->get();
        return view('analisis.index', compact('analisis'));
    }

    public function create()
    {
        $piletas = Pileta::where('activo','1')->get();
        
        return view('analisis.create',compact('piletas'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'Fecha' => 'required|date',
            'Az' => 'required',
            'Alc' => 'required',
            'Ph' => 'required',
            'AcTotal' => 'required',
            'AcVol' => 'required',
            'SOLibre' => 'required',
            'SOTotal' => 'required',
            'Color' => 'required',
            'LC' => 'required',
            'Matiz' => 'required',
            'nropileta' => 'required',
        ]);
        
        $analisis = new Analisis;
        $analisis->FechaAnalisis = date($request->Fecha);
        $analisis->Az = $request->Az;
        $analisis->Alc = $request->Alc;
        $analisis->Ph = $request->Ph;
        $analisis->AcTot = $request->AcTot;
        $analisis->AcVol = $request->AcVol;
        $analisis->SOLibre = $request->SOLibre;
        $analisis->SOTotal = $request->SOTotal;
        $analisis->Color = $request->Color;
        $analisis->LC = $request->LC;
        $analisis->Matiz = $request->Matiz;
        $analisis->pileta_id = $request->nropileta;
        $analisis->save();

        $analisis = Analisis::orderBy('FechaAnalisis', 'DESC')->get();
        return redirect()->route('analisis.index')->with('estado','Alta Exitosa!');
    }

    public function edit($id)
    {
        $piletas = Pileta::where('activo','1')->get();
        $analisis = Analisis::find($id);

        return view ('analisis.edit', compact('analisis', 'piletas'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'Fecha' => 'required|date',
            'Az' => 'required',
            'Alc' => 'required',
            'Ph' => 'required',
            'AcTotal' => 'required',
            'AcVol' => 'required',
            'SOLibre' => 'required',
            'SOTotal' => 'required',
            'Color' => 'required',
            'LC' => 'required',
            'Matiz' => 'required',
            'nropileta' => 'required',
        ]);

        $analisis = Analisis::find($id);
        $analisis->FechaAnalisis = $request->Fecha;
        $analisis->Az = $request->Az;
        $analisis->Alc = $request->Alc;
        $analisis->Ph = $request->Ph;
        $analisis->AcTot = $request->AcTot;
        $analisis->AcVol = $request->AcVol;
        $analisis->SOLibre = $request->SOLibre;
        $analisis->SOTotal = $request->SOTotal;
        $analisis->Color = $request->Color;
        $analisis->LC = $request->LC;
        $analisis->Matiz = $request->Matiz;
        $analisis->pileta_id = $request->nropileta;
        $analisis->save();
        return redirect()->route('analisis.index')->with('estado','Modificacion Exitosa!');
    }

    public function destroy($id)
    {
        $analisis = Analisis::find($id);
        $analisis->delete();

        return redirect()->route('analisis.index')->with('estado','Eliminado!');
    }
}
