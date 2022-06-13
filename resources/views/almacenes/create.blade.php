@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Agregar Almacen</p>
            </div>

            <form action="{{ route('almacenes.store') }}" method="POST">
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    @csrf
                    <div class="card-body justify-left w-2/4">
                        <p class="mb-2">Descripción: <input name="descripcion" class="rounded-md pl-2"></p>
                        <p>Activo: <b><input name="activo" class="rounded-md pl-2"></p></b>
                    </div>
                    <div class="card-body justify-left my-0 py-0 w-2/4">
                        <div class="card-body justify-center flex">
                            <button type="submit"
                                class="card-text bg-warning col-6 text-center rounded-md
                                mr-1 shadow-lg">Agregar</button>
                            <a href="{{ route('almacenes.index') }}" <p
                                class="card-text bg-danger col-6 text-center rounded-md ml-1 shadow-lg">Volver</p>
                            </a>
                        </div>
                    </div>
                </div>
            </form>


        </x-slot>

    </x-app-layout>

@stop
