@extends('dashboard.dashboard')

@section('titulo', 'User')

@section('contenido')
    <br> <h1 style="color: blue " class="text-center font-bold">REGISTROS DE USUARIOS</h1> <br>

    <div class="container px-6 mb-3">    
        <div class="mt-5">
          @can('user.create')
          <button class="rounded-lg bg-light shadow btn-md ">
            <a href="{{ route('user.create') }}" >
                <span>
                    <i class="fa fa-plus " style="color: #fa1808"></i>
                </span>
                &nbsp;
                Agregar
            </a>              
             </button> 
             <button class="rounded-lg bg-light shadow btn-md ">
                <a href="{{ route('pdf') }}" >
                    <span>
                        <i class="fa fa-file " style="color: #fa1808"></i>
                    </span>
                    &nbsp;
                    Pdf
                </a>              
                 </button>
          @endcan

            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Fullname</th>
                        <th class="bg-primary">Ci</th>
                        <th class="bg-primary">Email</th>
                        <th class="bg-primary">Accion</th>
                       
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                        
                         <tr>
                            <td>{{ $i++ }}</td>
                            <td data-label="nombre">{{$user->fullname}}</td>
                            <td data-label="finicio">{{$user->ci}}</td>
                            <td data-label="ffin">{{$user->email}}</td>
                            <td>
                                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                @can('user.destroy')
                                <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('delete')                            
                                    <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer"
                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>
                                </form>  
                                @endcan

                            </td>
                        </tr> 
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

@stop
