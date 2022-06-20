@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="text-center">
                <p>Seguimiento</p>
                {{-- <a class="float-right" href="{{ route('analisis.create') }}">
                    <button type="button"
                        class="card-text bg-success text-center rounded-md px-3 mr-1 shadow-lg">Agregar</button>
                </a> --}}
                <div class="flex">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Line Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="width: 50%;margin: 0 auto;">{!! $chart->container() !!}</div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                                {!! $chart->script() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-left ml-4">
                        <input name="chkAz" type="checkbox" checked> Azucar<br>
                        <input name="chkAlc" type="checkbox" checked> Alcohól<br>
                        <input name="chkPh" type="checkbox" checked> PH<br>
                        <input name="chkAcTot" type="checkbox" checked> AcTot<br>
                        <input name="chkAcVol" type="checkbox" checked> AcVol<br>
                        <input name="chkSOLibre" type="checkbox" checked> SO Libre<br>
                        <input name="chkSOTotal" type="checkbox" checked> SO Total<br>
                        <input name="chkColor" type="checkbox" checked> Color<br>
                        <input name="chkLC" type="checkbox" checked> Lc<br>
                        <input name="chkMatiz" type="checkbox" checked> Matiz<br>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-app-layout>

@stop
