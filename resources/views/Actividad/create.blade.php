@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
 <br> <br>
   <div class=" flex justify-center items-center">
    <div class="max-w-lg px-4 py-6  bg-white rounded-md dark:bg-darker ">
        <h1 class="text-xl font-semibold text-center">Registrar Actividad</h1>
        <form action="{{ route('crearActividad') }}" class="space-y-6 " method="POST" novalidate  enctype="multipart/form-data">
            @csrf
            @method('POST')
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="text"
            name="name"
            placeholder="Nombre"
            required
          />
          @error('name')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="text"
            name="description"
            placeholder="Descripcion"
            required
          />
          @error('description')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="date"
            name="date_ini"
            placeholder="Fecha Inicio"
            required
          />
          @error('date_ini')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="date"
            name="date_fin"
            placeholder="Fecha Fin"
            required
          />
          @error('date_fin')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          
           <label for="Estado" class="control-label">Periodo</label>
            <select class="form-select" name="id_periodo" aria-label="Default select example">
                {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                @foreach ($periodos as $periodo)
                    <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                 @endforeach
           </select>
           <br>
          <label for="Estado" class="control-label">Usuario</label>
          <select class="form-select" name="id_user" aria-label="Default select example">
                {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->fullname }}</option>
                 @endforeach
           </select>
           <br>
           <label for="Estado" class="control-label">Estado</label>
            <select class="form-select" name="id_status" aria-label="Default select example">
                {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                 @endforeach
           </select>
         
          <div>
            <button
              type="submit"
              class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
            >
              Registrar
            </button>
          </div>
        </form>
           
      </div>
   </div>
  
@endsection


@section('css')
@stop

@section('js')

@stop