<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //recupera todos los usuarios y los envia a la vista donde se muestra en forma de listado
    public function listar()
    {
        $usuarios = User::all();

        return view('usuarios', compact('usuarios'));
    }

    //recupera un usuario y lo envia a una vista con un formulario de edicion
    public function editar()
    {
        $usuario = User::all();

        return view('usuario', compact('usuario'));
    }
}
