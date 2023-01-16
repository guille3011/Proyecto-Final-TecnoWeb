<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;
    protected $fillable=[    
        'pgnombre',
        'pgcontador',     
    ];

    protected $guarded=['id','created_at','updated_at'];

    public static function contar($pgurl){
        $pagina=Pagina::where('pgnombre',$pgurl)->first();

        if($pagina==null){
            $pagina= new Pagina();
            $pagina->timestamps=false;
            $pagina->pgnombre=$pgurl;
            $pagina->pgcontador=0;
        }
        $pagina->timestamps=false;
        $pagina->pgcontador=$pagina->pgcontador+1;
        $pagina->save();
        return $pagina->pgcontador;
    }
}
