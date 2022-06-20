<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analisis;
use App\Models\Pileta;

use App\Models\User;
use App\Charts\UserChart;
use Illuminate\Support\Arr;

class AnalisisController extends Controller
{
    public $analisis;

    public $chkAz=true;
    public $chkAlc=true;
    public $chkPh=true;
    public $chkAcTot=true;
    public $chkAcVol=true;
    public $chkSOLibre=true;
    public $chkSOTotal=true;
    public $chkColor=true;
    public $chkLC=true;
    public $chkMatiz=true;

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
        
        $request->validate([
            'Fecha' => 'required',
            'Az' => 'required',
            'Alc' => 'required',
            'Ph' => 'required',
            'AcTot' => 'required',
            'AcVol' => 'required',
            'SOLibre' => 'required',
            'SOTotal' => 'required',
            'Color' => 'required',
            'LC' => 'required',
            'Matiz' => 'required',
            'nropileta' => 'required',
            
        ]);
        
        $analisis = new Analisis;
        $analisis->FechaAnalisis = $request->Fecha;
        // $analisis->FechaAnalisis = date($request->Fecha);
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
            'AcTot' => 'required',
            'AcVol' => 'required',
            'SOLibre' => 'required',
            'SOTotal' => 'required',
            'Color' => 'required',
            'LC' => 'required',
            'Matiz' => 'required',
            'nropileta' => 'required',

            // 'pileta_id' => 'required',
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

    public function seguimiento($request)
    {
        return view('analisis.seguimiento');
    }

    public function show($id)
    {
        // Genera eje X colocando las fechas de análisis encontradas
        $analisisFecha = Analisis::where('pileta_id',$id)
            ->orderBy('FechaAnalisis')->get('FechaAnalisis');
        $i=0;
        foreach($analisisFecha as $a) {
            $info[$i] = $a->FechaAnalisis; $i++;
        }

        // $analisis = Analisis::where('pileta_id',$id)
        //     ->orderBy('FechaAnalisis')
        //     ->pluck('AcVol');
            // ->get('AcVol');
            // $users = User::select(\DB::raw("COUNT(*) as count"))
            //         ->whereYear('created_at', date('Y'))
            //         ->groupBy(\DB::raw("Month(created_at)"))
            //         ->pluck('count');
            
            
        // Instancia el gráfico
        $chart = new UserChart;
    
        //Define valores para el eje X
        $chart->labels($info);
        
        // Azucar
        if($this->chkAz) {
        $Azucar = Analisis::where('pileta_id',$id)
            ->orderBy('FechaAnalisis')
            ->pluck('Az');
            // ->get('AcVol');
            // $users = User::select(\DB::raw("COUNT(*) as count"))
            //         ->whereYear('created_at', date('Y'))
            //         ->groupBy(\DB::raw("Month(created_at)"))
            //         ->pluck('count');
            $chart->dataset('Azucar', 'line', $Azucar)->options(['fill' => 'true','borderColor' => '#ff3361',]);
        }

        // Alcohól
        if($this->chkAlc) {
            $Alc = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('Alc');
            $chart->dataset('Alcohól', 'line', $Alc)->options(['fill' => 'true','borderColor' => '#ff33fc',]);
        }

        // PH
        if($this->chkPh) {
            $Ph = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('Ph');
            $chart->dataset('PH', 'line', $Ph)->options(['fill' => 'true','borderColor' => '#3349ff',]);
        }
        
        // AcTot
        if($this->chkAcTot) {
            $AcTot = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('AcTot');
            $chart->dataset('PH', 'line', $AcTot)->options(['fill' => 'true','borderColor' => '#33b2ff',]);
        }

        // AcVol
        if($this->chkAcVol) {
            $AcVol = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('AcVol');
            $chart->dataset('AcVol', 'line', $AcVol)->options(['fill' => 'true','borderColor' => '#33ffaf',]);
        }

        // SOLibre
        if($this->chkSOLibre) {
            $SOLibre = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('SOLibre');
            $chart->dataset('SOLibre', 'line', $SOLibre)->options(['fill' => 'true','borderColor' => '#33ff39',]);
        }

        // SOTotal
        if($this->chkSOTotal) {
            $SOTotal = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('SOTotal');
            $chart->dataset('SOTotal', 'line', $SOTotal)->options(['fill' => 'true','borderColor' => '#93ff33',]);
        }

        // Color
        if($this->chkColor) {
            $Color = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('Color');
            $chart->dataset('Color', 'line', $Color)->options(['fill' => 'true','borderColor' => '#ceff33',]);
        }

        // LC
        if($this->chkLC) {
            $LC = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('LC');
            $chart->dataset('LC', 'line', $LC)->options(['fill' => 'true','borderColor' => '#ffc733',]);
        }

        // Matiz
        if($this->chkMatiz) {
            $Matiz = Analisis::where('pileta_id',$id)->orderBy('FechaAnalisis')->pluck('Matiz');
            $chart->dataset('Matiz', 'line', $Matiz)->options(['fill' => 'true','borderColor' => '#ff5733',]);
        }
        return view('analisis.seguimiento', compact('chart'));
    }
}
