<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $fillable=[
       
        'nombre',
        'finicio',
        'ffin',
        'descripcion',
        'estado'
    ];

    protected $guarded=['id','created_at','updated_at'];
}
