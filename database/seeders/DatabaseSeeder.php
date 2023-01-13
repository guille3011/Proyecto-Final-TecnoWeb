<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PeriodoSeeder::class);
       // $this->call(ActivitySeeder::class);
      //  $this->call(TaskSeeder::class);
        
    }
}
