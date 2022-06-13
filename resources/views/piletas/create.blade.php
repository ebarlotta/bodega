@extends('adminlte::page')

@section('content')

<x-app-layout>
    <x-slot name="header">
        <div class="card-body text-center">
            <p class="card-text">Crear de Piletas</p>
        </div>
        <form action="{{ route('piletas.store') }}" method="POST">
         @csrf
            <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                <div class="card-body justify-left  block">
                    <p>Pileta Nro: <input name="nropileta" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('nropileta'))
                        <span class="text-danger"> {{ $errors->first() }} </span>
                    @endif
                    <p>Capacidad: <input name="capacidad" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('capacidad'))
                        <span class="text-danger"> {{ $errors->first('capacidad') }} </span>
                    @endif
                    <p>Estado: <input name="estado" class="rounded-md pl-2 mb-2"></p>
                    @if ($errors->get('estado'))
                        <span class="text-danger"> {{ $errors->first('estado') }} </span>
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
                        <a href="{{ route('piletas.index') }}" class="col-6 ">
                           <p class="card-text bg-danger text-center rounded-md ml-1 shadow-lg">Volver</p>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

</x-app-layout>

@stop