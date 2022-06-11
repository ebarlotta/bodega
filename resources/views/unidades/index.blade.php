@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Listado de Unidades
                    <a class="float-right" href="{{ route('unidades.create') }}">
                        <button type="button" class="card-text bg-success text-center rounded-md px-3 mr-1 shadow-lg">Agregar</button>
                    </a>
                </p>
            </div>

            @if (session('estado'))                
                <div class="card-body text-center bg-success  py-0 my-0 rounded-md">
                    <p class="card-text">{{ session('estado') }}</p>
                </div>
            @endif

            @foreach ($unidades as $unidad)
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    <div class="card-body justify-left  w-1/2">
                        <p>Descripción: <b>{{ $unidad->descripcion }}</p></b></b>
                        <p>Signo: <b>{{ $unidad->signo }}</p></b>
                    </div>
                    <div class="card-body justify-end w-1/2  my-0 py-0">
                        <div class="card-body text-center my-0 py-2">
                            <p class="card-text">Opciones</p>
                        </div>
                        <div class="card-body justify-center flex my-0 py-0">
                            <a href="{{ route('unidades.edit', $unidad->id) }}" class="card-text bg-warning col-5 text-center rounded-md mr-1 shadow-lg">
                                Modificar
                            </a>
                            <form action="{{ route('unidades.destroy', $unidad->id) }}" method="POST">
                                <button class="card-text bg-danger col-12 text-center rounded-md ml-1 shadow-lg" type="submit" class="btn btn-danger">Eliminar</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </x-slot>

    </x-app-layout>

@stop
