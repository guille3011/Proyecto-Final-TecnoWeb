@extends('dashboard.dashboard')

@section('titulo', 'Inicio')

@section('contenido')
    <br> <br>
    @php
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
        $idrole = DB::table('model_has_roles')
            ->where('model_id', $user->id)
            ->value('role_id');
    @endphp

    


     <div class=" flex justify-center items-center">
        <div class="max-w-lg px-4 py-6  bg-white rounded-md dark:bg-darker ">
            <img src="{{asset('img/ficct.png')}}" height="360px" width="360px">

            <h1 class="text-xl font-semibold text-center"> Usuario</h1>

            <h3 class="text-center">Email:</h3>
            <input disabled
                class="w-full px-4 py-2  border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                value="{{ $user->email }}" />

            <h3 class="text-center"> Nombre Completo:</h3>
            <input disabled
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                type="text" value="{{ $user->fullname }}" />

            <h3 class="text-center"> Carnet Identidad:</h3>
            <input disabled
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                type="text" value="{{ $user->ci }}"" />



            <h3 class="text-center"> Rol:</h3>
            <input disabled
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                type="text" value="{{ $name = DB::table('roles')->where('id', $idrole)->value('name') }}" /> 

        </div>
    </div>
@endsection


@section('css')
@stop

@section('js')
@stop
