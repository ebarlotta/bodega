@extends('adminlte::page')

@section('content')

<x-app-layout>
    <x-slot name="header">
        <div class="card-body text-center">
            <p class="card-text">Crear de Agregados</p>
        </div>
        <form action="{{ route('agregados.store') }}" method="POST">
         @csrf
            <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                <div class="card-body justify-left  block">
                    <p>Fecha: <input type="date" name="fecha" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('fecha'))
                        <span class="text-danger"> {{ $errors->first() }} </span>
                    @endif
                    <p>Descripcion: <input name="descripcion" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('descripcion'))
                        <span class="text-danger"> {{ $errors->first('descripcion') }} </span>
                    @endif
                    <p>Año: <input name="anio" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('anio'))
                        <span class="text-danger"> {{ $errors->first('anio') }} </span>
                    @endif
                    <p>Unidad: <select class="rounded-md pl-2 mb-2" name="unidad_id">
                        @foreach ($unidades as $unidad)
                            <option value="{{ $unidad->id}}">{{ $unidad->descripcion}}</option>    
                        @endforeach
                    </select></p>
                    @if ($errors->get('activo'))
                        <span class="text-danger"> {{ $errors->first('activo') }} </span>
                    @endif
                    <p>Habilitada: <input name="activo" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('activo'))
                        <span class="text-danger"> {{ $errors->first('activo') }} </span>
                    @endif
                </div>
                <div class="card-body justify-left  my-0 py-0">
                    <div class="card-body text-center">
                        <p class="card-text">Opciones</p>
                    </div>
                    <div class="card-body justify-center flex my-0 py-0">
                     <button type="submit" class="card-text bg-success col-6 text-center rounded-md mr-1 shadow-lg">Agregar</button>
                        <a href="{{ route('agregados.index') }}" class="col-6 ">
                           <p class="card-text bg-danger text-center rounded-md ml-1 shadow-lg">Volver</p>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

</x-app-layout>

@stop