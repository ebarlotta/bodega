@extends('adminlte::page')

@section('content')

<x-app-layout>
    <x-slot name="header">


        {{-- <div class="card-body text-center">
            <p>Vista de Socios.</p>
        </div>
        <div class="card-deck">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <p class="card-text">Some text inside the first card</p>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <p class="card-text">Some text inside the second card</p>
                </div>
            </div>
            <div class="card bg-success">
                <div class="card-body text-center">
                    <p class="card-text">Some text inside the third card</p>
                </div>
            </div>

        </div>
        <div class="card shadow-md bg-danger">
            <div class="card-body text-center">
                <p class="card-text">Some text inside the fourth card</p>
            </div>
        </div> --}}
        <div class="card-body text-center">
            <p class="card-text">Listado de Piletas</p>
        </div>

        @foreach ($piletas as $pileta)
            <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                <div class="card-body justify-left  block">
                    Pileta Nro: <b>{{ $pileta->nropileta }}</b><br>
                    Capacidad: {{ $pileta->capacidad }}<br>
                    Estado: {{ $pileta->estado }}<br>
                    @if ($pileta->activo)
                        <p class="card-text bg-success col-5 text-center rounded-md shadow-lg">Activa</p>
                    @else
                        <p class="card-text bg-danger  col-5 text-center rounded-md shadow-lg">Inactiva</p>
                    @endif
                </div>
                <div class="card-body justify-left  my-0 py-0">
                    <div class="card-body text-center">
                        <p class="card-text">Opciones</p>
                    </div>
                    <div class="card-body justify-center flex my-0 py-0">
                        <p class="card-text bg-warning col-5 text-center rounded-md mr-1 shadow-lg">Modificar</p>
                        <p class="card-text bg-danger col-5 text-center rounded-md ml-1 shadow-lg">Eliminar</p>
                    </div>
                </div>
            </div>
        @endforeach

    </x-slot>

</x-app-layout>

@stop