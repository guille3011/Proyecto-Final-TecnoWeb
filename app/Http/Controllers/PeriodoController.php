<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Pagina;
use App\Models\Activity;

class PeriodoController extends Controller
{
    
    public function index()
    {
        $periodos=Periodo::all();
        $c = Pagina::contar(request()->path());
        return view('periodo.index', compact('periodos','c'));
    }

 
    public function create()
    {
        $c = Pagina::contar(request()->path());
        return view('periodo.create', compact('c'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:periodos|max:10',
            'finicio'=>'required|unique:periodos',
             'ffin' =>'required|unique:periodos'
        ]);

        $periodo=new Periodo();
        $periodo->nombre=$request->nombre;
        $periodo->finicio=$request->finicio;
        $periodo->ffin=$request->ffin;
        $periodo->descripcion=$request->descripcion;
        
        $periodo->save();
        return redirect()->route('periodo.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $c = Pagina::contar(request()->path());
        $periodo=Periodo::findOrfail($id);
       return view('periodo.edit',compact('periodo','c'));
    }

    
    public function update(Request $request, $id)
    {
        
        $periodo=Periodo::findOrfail($id);
        $periodo->nombre=$request->nombre;
        $periodo->finicio=$request->finicio;
        $periodo->ffin=$request->ffin;
        $periodo->descripcion=$request->descripcion;
        $periodo->save();
        return redirect()->route('periodo.index');
    }

  
    public function destroy($id)
    {
        $periodo=Periodo::findOrfail($id);
        $periodo->estado=0;
        $periodo->save();
        return redirect()->route('periodo.index');
    }

    public function pdfPeriodo(){
        $actividades=Activity::orderBy('id_periodo','ASC')->get();
        $pdf= \PDF::loadView('seguimiento.pdf',compact('actividades'));
        return $pdf->stream('activity.pdf');
    }
}
