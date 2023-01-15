<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; 
use Illuminate\Support\Facades\DB;
use App\Models\Periodo;
use App\Models\User;
use App\Models\Pagina;


class GraficaController extends Controller
{
   public function grafica(){
      
     $aryrol=  array();
     $aryact=  array();
     $aryper=  array();


      $roles=DB::table('model_has_roles')->get();
      $arrayN=array("Autoridad","Administrativo");  
      foreach ($roles as $rol ) {
         array_push($aryrol,$rol->role_id);
       }
       sort($aryrol);
       $newarray=array_count_values($aryrol);
       // dump($newarray);
       // dump($arrayN);
       
       
       $actvs=DB::table('activities')->get();
       $periodo=DB::table('periodos')->get();
      foreach ($actvs as $act ) {
         array_push($aryact,$act->id_periodo);
       }
       foreach ($periodo as $per ) {
         array_push($aryper,$per->nombre);
       }
       sort($aryact);
       $newarray2=array_count_values($aryact); // actividades segun id periodo

      //  dump($newarray2);
      // dump($aryper);
      $c = Pagina::contar(request()->path());
       return view('grafica',compact('newarray','arrayN','newarray2','aryper'),compact('c'));
   }


   
}
