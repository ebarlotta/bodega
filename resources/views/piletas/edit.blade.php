@extends('adminlte::page')

@section('content')

    <x-app-layout>
        <x-slot name="header">

            <div class="card-body text-center">
                <p class="card-text">Actualizar Pileta</p>
            </div>

            <form action="{{ route('piletas.update', $pileta->id) }}" method="POST">
                <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
                    @csrf
                    @method('PUT')
                    <div class="card-body justify-left  w-3/2">


                        <p class="mb-2">Pileta Nro: <input name="nropileta" class="rounded-md pl-2 mb-2" value="{{ $pileta->nropileta }}"></p>
                        @if ($errors->get('nropileta'))
                            <span class="text-danger"> {{ $errors->first() }} </span>
                        @endif
                        <p class="mb-2">Capacidad: <input name="capacidad" class="rounded-md pl-2 mb-2" value="{{ $pileta->capacidad }}"></p>
                        @if ($errors->get('capacidad'))
                            <span class="text-danger"> {{ $errors->first('capacidad') }} </span>
                        @endif
                        <p class="mb-2">Estado: <input name="estado" class="rounded-md pl-2 mb-2" value="{{ $pileta->estado }}"></p>
                        @if ($errors->get('estado'))
                            <span class="text-danger"> {{ $errors->first('estado') }} </span>
                        @endif
                        <p class="mb-2">Habilitada: <input name="activo" class="rounded-md pl-2 mb-2" value="{{ $pileta->activo }}"></p>
                        @if ($errors->get('activo'))
                            <span class="text-danger"> {{ $errors->first('activo') }} </span>
                        @endif
                    </div>
                    <div class="card-body justify-left my-0 py-0  w-1/4">
                        <div class="card-body justify-center flex my-3 py-0">

                            <button type="submit"
                                class="card-text bg-warning col-6 text-center rounded-md
                                mr-1 shadow-lg">Actualizar</button>
                            <a href="{{ route('piletas.index') }}" <p
                                class="card-text bg-danger col-6 text-center rounded-md ml-1 shadow-lg">Volver</p>
                            </a>
                        </div>
                    </div>
                </div>
            </form>

        </x-slot>

    </x-app-layout>

@stop
