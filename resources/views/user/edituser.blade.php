@extends('dashboard.dashboard')

@section('titulo', 'User')

@section('contenido')
 <br> <br>
   <div class=" flex justify-center items-center">
    <div class="max-w-lg px-4 py-6  bg-white rounded-md dark:bg-darker ">
        <h1 class="text-xl font-semibold text-center">Editar Usuario</h1>
        <form action="{{route('user.update',$user->id)}}" class="space-y-6 " method="POST" novalidate  enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <input
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
            type="email"
            name="email"
            value="{{old('email',$user->email)}}"
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
            value="{{old('fullname',$user->fullname)}}"
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
          value="{{old('ci',$user->ci)}}"
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
        placeholder="contraseña"
        required
      />
      @error('password')
      <small class="text-danger" style="color: red">*{{ $message }}</small>
      <br>
      @enderror

      <select  name="roles" id="select-roles" readonly  class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker">
        <option value= "{{ $idrole}}">{{$name=DB::table('roles')->where('id', $idrole)->value('name')}}</option>
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
