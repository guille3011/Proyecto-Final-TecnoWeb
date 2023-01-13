<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Activity;
use App\Models\Status;
use App\Models\User;
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

        return view('Tarea.indexActividades',compact('actividades','usuarios'));
    }

    public function viewActividadesUser(){
        $usuario=User::findOrFail(Auth::user()->id);;
        $actividades= DB::table('activities')
                            ->where('id_user', '=', $usuario->id)
                            ->orderBy('date_fin', 'asc')
                            ->get();


        return view('Tarea.indexActividadesUser',compact('actividades'));
    }

    public function viewTareas(Activity $actividad){
        $tareas=DB::table('tasks')
        ->where('id_activity','=',$actividad->id)
        ->get();

        return view('Tarea.index',compact('tareas','actividad'));
    }

    public function crearTareaView(Activity $actividad){
        $statuses=Status::all();
        return view('Tarea.create',compact('actividad','statuses'));
    }


    public function crearTarea(Request $request, Activity $actividad){
        $data=$request->validate([
            'name' => ['required'],
            'description'=>['required'],
            'id_status'=>['required'],
        ]);

        $data['id_activity']=$actividad->id;

        Task::create($data);

        return redirect()->route('tarea.view',compact('actividad'));
    }


    public function editarTareaView(Task $tarea,Activity $actividad){
        $tarea=Task::where('id',$tarea->id)->first();
        $statuses=Status::all();

        return view('Tarea.edit',compact('tarea','actividad','statuses'));
    }


    public function editarTarea(Request $request, Task $tarea,Activity $actividad){
        $validate=$request->validate([
            'name'=>['required'],
            'description'=>['required'],
            'id_status'=>['required'],
        ]);

        $tarea->update($validate);
        return redirect()->route('tarea.view',compact('actividad'));
    }


    public function eliminarTarea(Task $tarea,Activity $actividad){
        $tarea->estado=0;
        $tarea->save();
        return redirect()->route('tarea.view',compact('actividad'));
    }
}
