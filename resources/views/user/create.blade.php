@extends('dashboard.dashboard')

@section('titulo', 'User')

@section('contenido')
 <br> <br>
   <div class=" flex justify-center items-center">
    <div class="max-w-lg px-4 py-6  bg-white rounded-md dark:bg-darker ">
        <h1 class="text-xl font-semibold text-center">Registrar Usuario</h1>
        <form action="{{route('user.store')}}" class="space-y-6 " method="POST" novalidate  enctype="multipart/form-data">
            @csrf
            @method('POST')
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="email"
            name="email"
            placeholder="carla.ccc344@gmail.com"
            required
          />
          @error('email')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror
          
    
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="text"
            name="fullname"
            placeholder="Nombre Completo"
            required
          />
          @error('fullname')
          <small class="text-danger" style="color: red">*{{ $message }}</small>
          <br>
          @enderror

          <input
          class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
          type="text"
          name="ci"
          placeholder="Ci"
          required
        />
        @error('ci')
        <small class="text-danger" style="color: red">*{{ $message }}</small>
        <br>
        @enderror
        <input
        class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
        type="password"
        name="password"
        
        required
      />
      @error('password')
      <small class="text-danger" style="color: red">*{{ $message }}</small>
      <br>
      @enderror

      <select name="roles" id="select-roles" class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" onchange="habilitar()" >
        <option value=0>Seleccione un rol</option>
            @foreach ($roles as $rol)
                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
            @endforeach
         </select>
         @error('roles')
        <small class="text-danger" style="color: red">*{{ $message }}</small>
        <br>
        @enderror

          <div>
            <button
              type="submit"
              class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
            >
              Registrar
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

