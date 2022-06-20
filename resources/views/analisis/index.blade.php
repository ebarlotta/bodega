@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Listado de Análisis</p>
                <a class="float-right" href="{{ route('analisis.create') }}">
                    <button type="button"
                        class="card-text bg-success text-center rounded-md px-3 mr-1 shadow-lg">Agregar</button>
                </a>
            </div>

            @foreach ($analisis as $analisiss)
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    <div class="card-body justify-left flex" style="width: 90%">
                        <div class="col-8 flex">
                            <div class="p-1 col-6" style="align-self: center;"> Fecha: {{ date_format(new DateTime($analisiss->FechaAnalisis),"d-m-Y") }}</div>
                            {{-- <div class="border-2 border-primary p-1 col-12"> Azucar {{ $analisiss->Az }}</div>
                            <div class="border-2 border-primary p-1 col-12"> Alcohól {{ $analisiss->Alc }}</div>
                            <div class="border-2 border-primary p-1 col-12"> PH {{ $analisiss->Ph }}</div>
                           </div>
                           
                           <div class="col-3">
                              <div class="border-2 border-primary p-1 col-12"> Acidez Total {{ $analisiss->AcTot }}</div>
                              <div class="border-2 border-primary p-1 col-12"> Acidez Volátil {{ $analisiss->AcVol }}</div>                              
                              <div class="border-2 border-primary p-1 col-12"> SO Libre {{ $analisiss->SOLibre }}</div>
                              <div class="border-2 border-primary p-1 col-12"> SO Total {{ $analisiss->SOTotal }}</div>
                           </div>

                        <div class="col-3">
                            <div class="border-2 border-primary p-1 col-12"> Color {{ $analisiss->Color }}</div>
                            <div class="border-2 border-primary p-1 col-12"> LC {{ $analisiss->LC }}</div>
                            <div class="border-2 border-primary p-1 col-12"> Matiz {{ $analisiss->Matiz }}</div> --}}
                            <div class="p-1 col-6" style="align-self: center;">
                                Pileta {{ $analisiss->piletas[0]->nropileta }}
                            </div>
                        </div>
                        <div class="card-body justify-center col-4 my-0 py-0 px-0 mx-0">
                            <div class="justify-center col-12 flex align-middle">
                               <a href="{{ route('analisis.show', $analisiss->pileta_id) }}" class="btn bg-info col-6 text-center rounded-md shadow-lg mb-2 ml-4 mr-1" >
                                Seguimiento
                               </a>
                                <a href="{{ route('analisis.edit', $analisiss->id) }}" class="btn bg-warning col-6 text-center rounded-md shadow-lg mb-2 mr-4 ml-1">
                                    Modificar
                                </a>
                            </div>
                            <div class="justify-center my-0 py-0 px-0 mx-0 col-12">
                                <form action="{{ route('analisis.destroy', $analisiss->id) }}" method="POST" class="col-12">
                                    <button class="btn bg-danger col-12 text-center rounded-md shadow-lg" type="submit" class="btn btn-danger">Eliminar</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </x-slot>

    </x-app-layout>

@stop
