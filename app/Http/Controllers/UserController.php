<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//use App\Http\Request;


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
        //dd($suRol);
        $roles = Role::all();
        return view('usuarioEdit', compact('user', 'roles', 'suRol'));
    }

    public function actualizar(Request $request, User $user)
    {
        $request->validate([
            'nombre' => "required",
            'email' => "required",
            'rol' => "required"
        ]);

        $user->roles()->sync($request->rol);
        $user->name = $request->nombre;
        $user->email = $request->email;

        $user->save();
        return redirect()->route('usuarios.listar');
    }
}
