@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Actualizar Almacen</p>
            </div>

            {{-- @foreach ($almacenes as $almacen) --}}
            <form action="{{ route('almacenes.update', $almacen->id) }}" method="POST">
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    @csrf
                    @method('PUT')
                    <div class="card-body justify-left  w-3/2">
                        <p class="mb-2">Descripción: <input name="descripcion" value="{{ $almacen->descripcion }}" class="rounded-md pl-2"></p>
                        <p>Activo: <b><input name="activo" value="{{ $almacen->activo }}" class="rounded-md pl-2"></p></b>
                    </div>
                    <div class="card-body justify-left my-0 py-0  w-1/4">
                        <div class="card-body justify-center flex my-3 py-0">

                            <button type="submit" class="card-text bg-warning col-6 text-center rounded-md
                                mr-1 shadow-lg">Actualizar</button>
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
