@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Agregar Análisis</p>
            </div>

            <form action="{{ route('analisis.store') }}" method="POST">
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    @csrf
                    <div class="card-body justify-left w-2/4">
                        <p class="mb-2">Fecha: <input name="Fecha" type="date" class="rounded-md pl-2" value="{{ old('Fecha')}}">
                        @if ($errors->get('Fecha'))
                            <span class="text-danger"> {{ $errors->first('Fecha') }} </span>
                        @endif</p>
                        <p class="mb-2">Azucar: <input name="Az" class="rounded-md pl-2" value="{{ old('Az')}}"></p>
                        @if ($errors->get('Az'))
                            <span class="text-danger"> {{ $errors->first('Az') }} </span>
                        @endif</p>
                        <p class="mb-2">Alcohól: <input name="Alc" class="rounded-md pl-2" value="{{ old('Alc')}}"></p>
                        @if ($errors->get('Alc'))
                            <span class="text-danger"> {{ $errors->first('Alc') }} </span>
                        @endif</p>
                        <p class="mb-2">PH: <input name="Ph" class="rounded-md pl-2" value="{{ old('Ph')}}"></p>
                        @if ($errors->get('Ph'))
                            <span class="text-danger"> {{ $errors->first('Ph') }} </span>
                        @endif</p>
                        <p class="mb-2">Acidez Total: <input name="AcTot" class="rounded-md pl-2" value="{{ old('AcTot')}}"></p>
                        @if ($errors->get('AcTot'))
                            <span class="text-danger"> {{ $errors->first('AcTot') }} </span>
                        @endif</p>
                        <p class="mb-2">Acidez Volátil: <input name="AcVol" class="rounded-md pl-2" value="{{ old('AcVol')}}"></p>
                        @if ($errors->get('AcVol'))
                            <span class="text-danger"> {{ $errors->first('AcVol') }} </span>
                        @endif</p>
                        <p class="mb-2">SO Libre: <input name="SOLibre" class="rounded-md pl-2" value="{{ old('SOLibre')}}"></p>
                        @if ($errors->get('SOLibre'))
                            <span class="text-danger"> {{ $errors->first('SOLibre') }} </span>
                        @endif</p>
                        <p class="mb-2">SO Total: <input name="SOTotal" class="rounded-md pl-2" value="{{ old('SOTotal')}}"></p>
                        @if ($errors->get('SOTotal'))
                            <span class="text-danger"> {{ $errors->first('SOTotal') }} </span>
                        @endif</p>
                        <p class="mb-2">Color: <input name="Color" class="rounded-md pl-2" value="{{ old('Color')}}"></p>
                        @if ($errors->get('Color'))
                            <span class="text-danger"> {{ $errors->first('Color') }} </span>
                        @endif</p>
                        <p class="mb-2">LC: <input name="LC" class="rounded-md pl-2" value="{{ old('Color')}}"></p>
                        @if ($errors->get('LC'))
                            <span class="text-danger"> {{ $errors->first('LC') }} </span>
                        @endif</p>
                        <p class="mb-2">Matiz: <input name="Matiz" class="rounded-md pl-2" value="{{ old('Matiz')}}"></p>
                        @if ($errors->get('Matiz'))
                            <span class="text-danger"> {{ $errors->first('Matiz') }} </span>
                        @endif</p>
                        <p class="mb-2">Pileta
                            <select class="rounded-md pl-2" name="nropileta">
                                @foreach ($piletas as $pileta)
                                    <option value="{{ $pileta->id }}">{{ $pileta->nropileta }}</option>
                                @endforeach
                            </select>
                            @if ($errors->get('nropileta'))
                                <span class="text-danger"> {{ $errors->first('nropileta') }} </span>
                            @endif</p>
                        </p>
                    </div>
                    <div class="card-body justify-left my-0 py-0 w-2/4">
                        <div class="card-body justify-center flex">
                            <button type="submit"
                                class="card-text bg-warning col-6 text-center rounded-md
                                mr-1 shadow-lg">Agregar</button>
                            <a href="{{ route('analisis.index') }}" <p
                                class="card-text bg-danger col-6 text-center rounded-md ml-1 shadow-lg">Volver</p>
                            </a>
                        </div>
                    </div>
                </div>
            </form>


        </x-slot>

    </x-app-layout>

@stop
