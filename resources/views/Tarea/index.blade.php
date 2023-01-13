@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
    <br> <br>

    <div class="container px-6 mb-3">    
        <div class="mt-5">

            @can('crearTarea.view')
                <button class="rounded-lg bg-light shadow btn-md ">
                    <a href="{{ route('crearTarea.view',$actividad->id) }}" >
                        <span>
                            <i class="fa fa-plus " style="color: #fa1808"></i>
                        </span>
                        &nbsp;
                        Agregar Tarea
                    </a>
                </button>
            @endcan

            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Nombre</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Estado</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($tareas as $tarea)
                         @if ($tarea->estado==1)
                         <tr>
                            <td>{{ $i++ }}</td>
                            <td data-label="name">{{$tarea->name}}</td>
                            <td data-label="description">{{$tarea->description}}</td>
                            <td data-label="Estado">
                                @php
                                    $estados=DB::table('statuses')
                                                 ->where('id', '=', $tarea->id_status)->get();
                                 @endphp
                                  @foreach ($estados as $estado)
                                    @php
                                        $estado_nombre=$estado->name;
                                    @endphp
                                  @endforeach
                                {{$estado_nombre}}
                            </td>
                            <td>
                                @can('editarTarea.view')
                                <a href="{{ route('editarTarea.view',array($tarea->id,$actividad->id)) }}" 
                                    class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                    
                                @endcan
                                @can('eliminarTarea')
                                <form action="{{ route('eliminarTarea',array($tarea->id,$actividad->id)) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer"
                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>
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