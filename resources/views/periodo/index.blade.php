@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
    <br>
    <h1 style="color: blue " class="text-center font-bold">REGISTROS DE PERIODO</h1><br>

    <div class="container px-6 mb-3">
        <div class="mt-5">
            @can('periodo.create')
                <button class="rounded-lg bg-light shadow btn-md ">
                    <a href="{{ route('periodo.create') }}">
                        <span>
                            <i class="fa fa-plus " style="color: #fa1808"></i>
                        </span>
                        &nbsp;
                        Agregar
                    </a>

                </button>
            @endcan

            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Nombre</th>
                        <th class="bg-primary">FechaInicio</th>
                        <th class="bg-primary">FechaFin</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($periodos as $periodo)
                            @if ($periodo->estado == 1)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td data-label="nombre">{{ $periodo->nombre }}</td>
                                    <td data-label="finicio">{{ $periodo->finicio }}</td>
                                    <td data-label="ffin">{{ $periodo->ffin }}</td>
                                    <td data-label="descripcion">{{ $periodo->descripcion }}</td>
                                    <td>
                                        @can('periodo.edit')
                                        <a href="{{ route('periodo.edit', $periodo->id) }}"
                                            class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                        @endcan
                                        @can('periodo.destroy')
                                            <form action="{{ route('periodo.destroy', $periodo->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer"
                                                    onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                    value="Borrar"></button>
                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
                <h4>nro visitas {{$c}}</h4>
            </div>
        </div>
    </div>

@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('style/table.css') }}">
@stop

@section('js')

@stop
