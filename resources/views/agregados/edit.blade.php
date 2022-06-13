@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Actualizar Agregado</p>
            </div>

            <form action="{{ route('agregados.update', $agregado->id) }}" method="POST">
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    @csrf
                    @method('PUT')
                    <div class="card-body justify-left  w-3/2">
                        <p>Fecha: <input type="date" name="fecha" class="rounded-md pl-2 mb-2" value="{{ $agregado->fecha }}"></p>
                        @if ($errors->get('fecha'))
                            <span class="text-danger"> {{ $errors->first() }} </span>
                        @endif
                        <p>Descripcion: <input name="descripcion" class="rounded-md pl-2 mb-2" value="{{ $agregado->descripcion }}"></p>
                        @if ($errors->get('descripcion'))
                            <span class="text-danger"> {{ $errors->first('descripcion') }} </span>
                        @endif
                        <p>Año: <input name="anio" class="rounded-md pl-2 mb-2" value="{{ $agregado->anio }}"></p>
                        @if ($errors->get('anio'))
                            <span class="text-danger"> {{ $errors->first('anio') }} </span>
                        @endif
                        <p>Unidad: <select class="rounded-md pl-2 mb-2" name="unidad_id" value="{{ $agregado->unidad_id }}">
                            @foreach ($unidades as $unidad)
                              
                                <option value="{{ $unidad->id }}" @if($agregado->unidad_id == $unidad->id) selected @endif>{{ $unidad->descripcion}}</option>    
                            @endforeach
                        </select></p>
                        @if ($errors->get('unidad_id'))
                            <span class="text-danger"> {{ $errors->first('unidad_id') }} </span>
                        @endif
                        <p>Habilitada: <input name="activo" class="rounded-md pl-2 mb-2" value="{{ $agregado->activo }}"></p>
                        @if ($errors->get('activo'))
                            <span class="text-danger"> {{ $errors->first('activo') }} </span>
                        @endif
                    </div>
                    <div class="card-body justify-left my-0 py-0  w-1/4">
                        <div class="card-body justify-center flex my-3 py-0">

                            <button type="submit"
                                class="card-text bg-warning col-6 text-center rounded-md
                                mr-1 shadow-lg">Actualizar</button>
                            <a href="{{ route('agregados.index') }}" <p
                                class="card-text bg-danger col-6 text-center rounded-md ml-1 shadow-lg">Volver</p>
                            </a>
                        </div>
                    </div>
                </div>
            </form>

        </x-slot>

    </x-app-layout>

@stop
