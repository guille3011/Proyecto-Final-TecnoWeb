@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
 <br> <br>
   <div class=" flex justify-center items-center">
    <div class="max-w-lg px-4 py-6  bg-white rounded-md dark:bg-darker ">
        <h1 class="text-xl font-semibold text-center">Editar Documento</h1>
        <form action="{{ route('editarDocumento',array($documento->id,$actividad->id)) }}" class="space-y-6 " method="POST" novalidate  enctype="multipart/form-data">
            @csrf
            @method('POST')
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="text"
            name="name"
            value="{{old('name',$documento->name)}}"
            required
          />
          @error('nombre')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          <input type="file" name="url" id="doc"  
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 
                dark:focus:ring-primary-darker" value="{{old('url',$documento->url)}}"
            >
            @error('url')
            <small class="text-danger" style="color: red">*{{ $message }}</small>
            <br>
            @enderror

          <div>
            <button
              type="submit"
              class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
            >
              Guardar
            </button>
          </div>
        </form>
           
        <div><h4>nro visitas {{$c}}</h4></div>
      </div>
   </div>
  
@endsection


@section('css')
@stop

@section('js')

@stop