<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //recupera todos los usuarios y los envia a la vista donde se muestra en forma de listado
    public function listar()
    {
        $usuarios = User::all();

        return view('usuarioList', compact('usuarios'));
    }

    //recupera un usuario y lo envia a una vista con un formulario de edicion
    public function editar(User $user)
    {
        //return $user;

        $roles = Role::all();
        return view('usuarioEdit', compact('user', 'roles'));
    }

    public function actualizar(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return redirect()->route('usuarios.listar');

        //return view('usuarioEdit', compact('user', 'roles'));
    }
}
