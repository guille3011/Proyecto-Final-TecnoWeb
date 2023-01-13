<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodoSeeder extends Seeder
{
    
    public function run()
    {
        Periodo::factory(6)->create();
   /*
    update cup.periodos set nombre='1-2020' where id=1;
    update cup.periodos set nombre='2-2020' where id=2;
    update cup.periodos set nombre='1-2021' where id=3;
    update cup.periodos set nombre='2-2021' where id=4;
    update cup.periodos set nombre='1-2022' where id=5;
    update cup.periodos set nombre='2-2022' where id=6;
    */
    }
}

