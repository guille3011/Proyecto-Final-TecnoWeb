<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname'=>'Juan Perez',
            'ci'=>'1122334 SC',
            'email'=>'juan@gmail.com',
            'password'=>Hash::make('123123'),            
        ])->assignRole('administrativo');

        User::create([
            'fullname'=>'Liliana Torrico',
            'ci'=>'4332211 SC',
            'email'=>'liliana@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');
        
        User::create([
            'fullname'=>'Pedro Perez',
            'ci'=>'1122339 SC',
            'email'=>'pedro@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');

        User::create([
            'fullname'=>'Maria Selva',
            'ci'=>'3899741 SC',
            'email'=>'maria@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');

        User::create([
            'fullname'=>'Danila Selva',
            'ci'=>'3895641 SC',
            'email'=>'dami@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');

        User::create([
            'fullname'=>'Marife Selva',
            'ci'=>'3899841 SC',
            'email'=>'mari@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');  

        User::create([
            'fullname'=>'Maria Zelma',
            'ci'=>'3899741 SC',
            'email'=>'mariazelma@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');

        User::create([
            'fullname'=>'Belen Sanis',
            'ci'=>'3159741 SC',
            'email'=>'belen@gmail.com',
            'password'=>Hash::make('123123'),
        ])->assignRole('administrativo');
    }
}
