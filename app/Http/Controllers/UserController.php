<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pagina;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $c = Pagina::contar(request()->path());
        return view('user.index', compact('users','c'));
    }


    public function create()
    {
        $roles = DB::table('roles')->get();
        $c = Pagina::contar(request()->path());
        return view('user.create', compact('roles','c'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'fullname' => 'required|max:35',
            'ci' => 'required',
            'roles' => 'required'
        ]);

        $user = new User;
        $user->fullname = $request->fullname;
        $user->ci = $request->ci;
        $user->email = $request->email;
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $user->roles()->sync($request->roles);
       /* $user->assignRole('Admin');*/
        return redirect()->route('user.index');

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $roles = DB::table('roles')->get();
        $idrole=DB::table('model_has_roles')->where('model_id', $id)->value('role_id');
        $user = User::findOrfail($id);
        $c = Pagina::contar(request()->path());
        return view('user.edit', compact('user', 'roles','idrole'),compact('c'));
    }


    public function update(Request $request, $id)
    {



        $this->validate($request, [
            'email' => 'required|email',
            'fullname' => 'required|max:35',
            'roles' => 'required'
        ]);

        $user = User::findOrFail($id);
        if ($user->email <> $request->email) {
            $user->email = $request->email;
        }
        if ($user->fullname <> $request->fullname) {
            $user->fullname = $request->fullname;
        }
        if ($request->password <> '') {
            $user->password = bcrypt(($request->password));
            // $usuario->password = $request->password;
        }
        
        if ($request->ci <> '') {
            $user->ci = $request->ci;
        }
        $user->roles()->sync($request->roles);      
        $user->save();
        return view('pagina');
    }


    public function editaruser(){
        $user = User::findOrFail(Auth::user()->id);
        $idrole=DB::table('model_has_roles')->where('model_id', $user->id)->value('role_id');
        $c = Pagina::contar(request()->path());
        return view('user.edituser', compact('user','idrole','c'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('user.index');
    }
}
