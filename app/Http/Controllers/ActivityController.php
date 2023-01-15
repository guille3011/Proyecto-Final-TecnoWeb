<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Periodo;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pagina;

class ActivityController extends Controller
{
    public function viewActividadesAutoridad(){
        $actividades=Activity::all();
        $usuarios=DB::table('users')
        ->where('estado', '=', 1)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Actividad.index',compact('actividades','usuarios','c'));
    }

    public function viewActividadesUser(){

        $usuario=User::findOrFail(Auth::user()->id);;
        $actividades= DB::table('activities')
                            ->where('id_user', '=', $usuario->id)
                            ->orderBy('date_fin', 'asc')
                            ->get();

        $c = Pagina::contar(request()->path());
        return view('Actividad.indexUser',compact('actividades','c'));
    }


    public function crearActividadView(){
        $usuarios=DB::table('users')
        ->where('estado', '=', 1)
        ->get();

        $statuses=DB::table('statuses')
        ->where('estado', '=', 1)
        ->get();

        $periodos=DB::table('periodos')
        ->where('estado', '=', 1)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Actividad.create',compact('usuarios','statuses','periodos'),compact('c'));
    }


    public function crearActividad(Request $request){
        $validate=$request->validate([
            'name'=>['required'],
            'description'=>['required'],
            'date_ini'=>['required'],
            'date_fin'=>['required'],
            'id_user'=>['required'],
            'id_status'=>['required'],
            'id_periodo'=>['required'],
        ]);

        $datos=[ 
            'name'=>$request->name,
            'description'=>$request->description,
            'date_ini'=>$request->date_ini,
            'date_fin'=>$request->date_fin,
            'id_user'=>$request->id_user,
            'id_status'=>$request->id_status,
            'id_periodo'=>$request->id_periodo,        
        ];

        Activity::create($datos);
        return redirect()->route('actividad.view');
    }


    public function editarActividadView(Activity $actividad){
        $actividad=Activity::where('id',$actividad->id)->first();

        $statuses=DB::table('statuses')
        ->where('estado', '=', 1)
        ->get();

        $periodos=DB::table('periodos')
        ->where('estado', '=', 1)
        ->get();

        $usuarios=DB::table('users')
        ->where('estado', '=', 1)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Actividad.edit',compact('actividad','statuses','periodos','usuarios'),compact('c'));
    }


    public function editarActividad(Request $request, Activity $actividad){
        $validate=$request->validate([
            'name'=>['required'],
            'description'=>['required'],
            'date_ini'=>['required'],
            'date_fin'=>['required'],
            'id_user',
            'id_status'=>['required'],
            'id_periodo',
        ]);

        $actividad->update($validate);
        return redirect()->route('actividad.view');
    }

    public function editarActividadViewUser(Activity $actividad){
        $actividad=Activity::where('id',$actividad->id)->first();

        $statuses=DB::table('statuses')
        ->where('estado', '=', 1)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Actividad.editUser',compact('actividad','statuses','c'));
    }

    public function editarActividadUser(Request $request, Activity $actividad){
        $validate=$request->validate([
            'id_status'=>['required'],       
        ]);

        $actividad->update($validate);
        return redirect()->route('actividadU.view');
    }


    public function eliminarActividad(Activity $actividad){
        $actividad->estado=0;
        $actividad->save();
        return redirect()->route('actividad.view');
    }
}
