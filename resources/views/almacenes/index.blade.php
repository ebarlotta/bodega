@extends('adminlte::page')

@section('content')

<x-app-layout>
   <x-slot name="header">

       <div class="card-body text-center">
           <p class="card-text">Listado de Almacenes</p>
            <a class="float-right" href="{{ route('almacenes.create') }}">
                <button type="button" class="card-text bg-success text-center rounded-md px-3 mr-1 shadow-lg">Agregar</button>
            </a>
       </div>

       @foreach ($almacenes as $almacen)
           <div class="card shadow-lg mt-3 col-12 flex-row" style="background-color: rgb(190, 190, 190);">
               <div class="card-body justify-left  block">
                   Descripción: <b>{{ $almacen->descripcion }}</b>
                   @if ($almacen->activo)
                       <p class="card-text bg-success col-5 text-center rounded-md shadow-lg">Activo</p>
                   @else
                       <p class="card-text bg-danger  col-5 text-center rounded-md shadow-lg">Inactivo</p>
                   @endif
               </div>
               <div class="card-body justify-left  my-0 py-0">
                   <div class="card-body text-center my-0 py-2">
                       <p class="card-text">Opciones</p>
                   </div>
                   <div class="card-body justify-center flex my-0 py-0">
                    <a href="{{ route('almacenes.edit', $almacen->id) }}" class="card-text bg-warning col-5 text-center rounded-md mr-1 shadow-lg">
                        Modificar
                    </a>
                    <form action="{{ route('almacenes.destroy', $almacen->id) }}" method="POST">
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