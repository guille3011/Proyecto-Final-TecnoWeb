@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
    <br>  <h1 style="color: blue " class="text-center font-bold">REGISTRO DE ACTIVIDADES</h1><br>

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
                                <a href="{{ route('editarActividadU.view',$actividad->id) }}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                @can('eliminarActividad')
                                <form action="{{ route('eliminarActividad',$actividad->id) }}" method="post">
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
        <div><h4>nro visitas {{$c}}</h4></div>
    </div>

@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('style/table.css') }}">
@stop

@section('js')

@stop