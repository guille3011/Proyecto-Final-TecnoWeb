@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
    <br> <br>

    <div class="container px-6 mb-3">    
        <div class="mt-5">
            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Nombre</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Fecha Inicio</th>
                        <th class="bg-primary">Fecha Fin</th>
                        <th class="bg-primary">Encargado</th>
                        <th class="bg-primary">Estado</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($actividades as $actividad)
                         @if ($actividad->estado==1)
                         <tr>
                            <td>{{ $actividad->id }}</td>
                            <td data-label="nombre">{{$actividad->name}}</td>
                            <td data-label="descripcion">{{$actividad->description}}</td>
                            <td data-label="fecha_inicio">{{$actividad->date_ini}}</td>
                            <td data-label="fecha_fin">{{$actividad->date_fin}}</td>
                            <td data-label="Encargado">
                                @php
                                    $encargados=DB::table('users')
                                                 ->where('id', '=', $actividad->id_user)->get();
                                 @endphp
                                  @foreach ($encargados as $encargado)
                                    @php
                                        $encargado2=$encargado->fullname;
                                    @endphp
                                  @endforeach

                                {{$encargado2}}
                            </td>
                            <td data-label="Estado">
                                @php
                                    $estados=DB::table('statuses')
                                                 ->where('id', '=', $actividad->id_status)->get();
                                 @endphp
                                  @foreach ($estados as $estado)
                                    @php
                                        $estado_nombre=$estado->name;
                                    @endphp
                                  @endforeach
                                {{$estado_nombre}}
                            </td>
                            <td>
                                <button class="rounded-lg bg-light shadow btn-md ">
                                    <a href="{{ route('tarea.view',$actividad->id) }}" >
                                        <span>
                                            <i class="fa fa-plus " style="color: #08defa"></i>
                                        </span>
                                        &nbsp;
                                        Ver Tareas
                                    </a>
                               </button>
                            </td>
                        </tr> 
                         @endif
                            
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        
        <div><h4>nro visitas {{$c}}</h4></div>
    </div>

@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('style/table.css') }}">
@stop

@section('js')

@stop