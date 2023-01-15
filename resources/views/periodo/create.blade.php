@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
 <br> <br>
   <div class=" flex justify-center items-center">
    <div class="max-w-lg px-4 py-6  bg-white rounded-md dark:bg-darker ">
        <h1 class="text-xl font-semibold text-center">Registrar Periodo</h1>
        <form action="{{ route('periodo.store') }}" class="space-y-6 " method="POST" novalidate  enctype="multipart/form-data">
            @csrf
            @method('POST')
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="text"
            name="nombre"
            placeholder="1-2020"
            required
          />
          @error('nombre')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="date"
            name="finicio"
            placeholder="Fecha Inicio"
            required
          />
          @error('finicio')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="date"
            name="ffin"
            placeholder="Fecha Fin"
            required
          />
          @error('ffin')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="text"
            name="descripcion"
            placeholder="Descripcion"
            
            required
          />
         
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
    
    <h4>nro visitas {{$c}}</h4>
@endsection


@section('css')
@stop

@section('js')

@stop
