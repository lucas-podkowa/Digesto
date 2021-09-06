<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function listar()
    {
        $usuarios = User::all();

        return view('usuarioList', compact('usuarios'));
    }


    public function editar(User $user)
    {
        $suRol = $user->getRoleNames(); // Returns a collection

        //dd($suRol->first());

        $roles = Role::all();
        return view('usuarioEdit', compact('user', 'roles', 'suRol'));
    }

    public function actualizar(Request $request, User $user)
    {

        $user->roles()->sync($request->rol);
        $user->name = $request->name;
        $user->email = $request->email;


        $user->save();
        return redirect()->route('usuarios.listar');

        // // // // // // // //return view('usuarioEdit', compact('user', 'roles'));
    }
}
