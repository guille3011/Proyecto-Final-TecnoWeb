<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        //'observartion',
        'date_ini',
        'date_fin',
        'id_user',
        'id_status',
        'id_periodo',
        'estado',
    ];
}
