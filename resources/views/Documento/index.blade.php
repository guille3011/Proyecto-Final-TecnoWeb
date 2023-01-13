@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
    <br> <br>

    <div class="container px-6 mb-3">
        <div class="mt-5">

            @can('crearDocumento.view')
                <button class="rounded-lg bg-light shadow btn-md ">
                    <a href="{{ route('crearDocumento.view', $actividad->id) }}">
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
                        <th class="bg-primary">URL</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($documentos as $documento)
                            @if ($documento->estado == 1)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td data-label="nombre">{{ $documento->name }}</td>
                                    <td data-label="url">
                                        <a href="{{ asset('/storage/' . $documento->url) }}">
                                            Archivo...
                                        </a>
                                    </td>
                                    <td>
                                        @can('editarDocumento.view')
                                            <a href="{{ route('editarDocumento.view', [$documento->id, $actividad->id]) }}"
                                                class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                        @endcan
                                        @can('eliminarDocumento')
                                            <form action="{{ route('eliminarDocumento', [$documento->id, $actividad->id]) }}"
                                                method="post">
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
            </div>
        </div>
    </div>

@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('style/table.css') }}">
@stop

@section('js')

@stop
