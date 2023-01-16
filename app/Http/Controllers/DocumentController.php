<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pagina;

class DocumentController extends Controller
{
    public function viewActividades(){
        $actividades=Activity::all();
        $usuarios=DB::table('users')
        ->where('estado', '=', 1)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Documento.indexActividades',compact('actividades','usuarios','c'));
    }

    public function viewActividadesUser(){
        $usuario=User::findOrFail(Auth::user()->id);;
        $actividades= DB::table('activities')
                            ->where('id_user', '=', $usuario->id)
                            ->orderBy('date_fin', 'asc')
                            ->get();

                            $c = Pagina::contar(request()->path());
        return view('Documento.indexActividadesUser',compact('actividades','c'));
    }

    public function viewDocumentos(Activity $actividad){
        $documentos=DB::table('documents')
        ->where('id_activity','=',$actividad->id)
        ->get();
        $c = Pagina::contar(request()->path());
        return view('Documento.index',compact('documentos','actividad','c'));
    }

    public function crearDocumentoView(Activity $actividad){
        $c = Pagina::contar(request()->path());
        return view('Documento.create',compact('actividad','c'));
    }


    public function crearDocumento(Request $request, Activity $actividad){
        $data=$request->validate([
            'name' => ['required'],
        ]);

        $data['id_activity']=$actividad->id;

        if(is_null($request->url)){
            return back()->withErrors(['error' => 'Introduce archivo']);
        }

        if($request->hasFile('url')){
            $data['url']=Storage::disk('public')->put('Documentos',$request->url);
        }
        Document::create($data);
        $c = Pagina::contar(request()->path());
        return redirect()->route('documento.view',compact('actividad','c'));
    }


    public function editarDocumentoView(Document $documento,Activity $actividad){
        $documento=Document::where('id',$documento->id)->first();
        $c = Pagina::contar(request()->path());
        return view('Documento.edit',compact('documento','actividad','c'));
    }


    public function editarDocumento(Request $request, Document $documento,Activity $actividad){
        $validate=$request->validate([
            'name'=>['required'],
        ]);

        if ($request->hasFile('url')) {
            if (!is_null($documento->url)) {
                Storage::disk('public')->delete($documento->url);
            }
    
            $validate['url'] = Storage::disk('public')->put('Documentos', $request->url);
        }
        

        $documento->update($validate);
        return redirect()->route('documento.view',compact('actividad'));
    }


    public function eliminarDocumento(Document $documento,Activity $actividad){
        $documento->estado=0;
        $documento->save();
        return redirect()->route('documento.view',compact('actividad'));
    }
}
