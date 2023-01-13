<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'autoridad']);
        $role2 = Role::create(['name'=>'administrativo']);

        Permission::create(['name'=>'user.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'user.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'user.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'user.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=>'periodo.index'])->syncRoles([$role1,$role2]);;
        Permission::create(['name'=>'periodo.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'periodo.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'periodo.destroy'])->syncRoles([$role1]);


        Permission::create(['name'=>'crearActividad.view'])->syncRoles([$role1]);;
        Permission::create(['name'=>'eliminarActividad'])->syncRoles([$role1]);
        
        
        Permission::create(['name'=>'editarDocumento.view'])->syncRoles([$role2]);
        Permission::create(['name'=>'eliminarDocumento'])->syncRoles([$role2]);

        Permission::create(['name'=>'editarTarea.view'])->syncRoles([$role2]);
        Permission::create(['name'=>'eliminarTarea'])->syncRoles([$role2]);
        
        Permission::create(['name'=>'actividadU.view'])->syncRoles([$role2]);
        Permission::create(['name'=>'DocActividadU.view'])->syncRoles([$role2]);
        Permission::create(['name'=>'TareaActividadU.view'])->syncRoles([$role2]);

        Permission::create(['name'=>'actividad.view'])->syncRoles([$role1]);
        Permission::create(['name'=>'DocActividad.view'])->syncRoles([$role1]);
        Permission::create(['name'=>'TareaActividad.view'])->syncRoles([$role1]);

        Permission::create(['name'=>'crearDocumento.view'])->syncRoles([$role2]);;
        Permission::create(['name'=>'crearTarea.view'])->syncRoles([$role2]);;

        $user = new User();
        $user->fullname = 'Carla Cruz';
        $user->ci = '8226422';       
        $user->email = 'carla.ccc344@gmail.com';       
        $user->password = bcrypt('12345');
        $user->save();
        $user->assignRole('autoridad');

        $user = new User();
        $user->fullname = 'Guillermo Cespedes Lazarte';
        $user->ci = '5880289 SC';       
        $user->email = 'guillermo@gmail.com';       
        $user->password = bcrypt('123123');
        $user->save();
        $user->assignRole('autoridad');

        $user = new User();
        $user->fullname = 'Sebastian Calderon';
        $user->ci = '1122334 SC';       
        $user->email = 'sebastian@gmail.com';       
        $user->password = bcrypt('123123');
        $user->save();
        $user->assignRole('autoridad');
    }


   
}
