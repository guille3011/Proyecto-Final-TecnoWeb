<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Activity;
use App\Models\Status;
use App\Models\User;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function viewActividades2(){
        $actividades=Activity::all();
        $usuarios=DB::table('users')
        ->where('estado', '=', 1)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Tarea.indexActividades',compact('actividades','usuarios','c'));
    }

    public function viewActividadesUser(){
        $usuario=User::findOrFail(Auth::user()->id);;
        $actividades= DB::table('activities')
                            ->where('id_user', '=', $usuario->id)
                            ->orderBy('date_fin', 'asc')
                            ->get();

                            $c = Pagina::contar(request()->path());
        return view('Tarea.indexActividadesUser',compact('actividades','c'));
    }

    public function viewTareas(Activity $actividad){
        $tareas=DB::table('tasks')
        ->where('id_activity','=',$actividad->id)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Tarea.index',compact('tareas','actividad','c'));
    }

    public function crearTareaView(Activity $actividad){
        $statuses=Status::all();
        $c = Pagina::contar(request()->path());
        return view('Tarea.create',compact('actividad','statuses','c'));
    }


    public function crearTarea(Request $request, Activity $actividad){
        $data=$request->validate([
            'name' => ['required'],
            'description'=>['required'],
            'id_status'=>['required'],
        ]);

        $data['id_activity']=$actividad->id;

        Task::create($data);
        $c = Pagina::contar(request()->path());
        return redirect()->route('tarea.view',compact('actividad','c'));
    }


    public function editarTareaView(Task $tarea,Activity $actividad){
        $tarea=Task::where('id',$tarea->id)->first();
        $statuses=Status::all();
        $c = Pagina::contar(request()->path());
        return view('Tarea.edit',compact('tarea','actividad','statuses','c'));
    }


    public function editarTarea(Request $request, Task $tarea,Activity $actividad){
        $validate=$request->validate([
            'name'=>['required'],
            'description'=>['required'],
            'id_status'=>['required'],
        ]);

        $tarea->update($validate);
        $c = Pagina::contar(request()->path());
        return redirect()->route('tarea.view',compact('actividad','c'));
    }


    public function eliminarTarea(Task $tarea,Activity $actividad){
        $tarea->estado=0;
        $tarea->save();
        return redirect()->route('tarea.view',compact('actividad'));
    }
}
