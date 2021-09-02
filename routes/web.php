<?php

use App\Http\Controllers\DigestoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');



Route::get('/documentos', [DocumentoController::class, 'index'])->name('digesto.index');

Route::get('/documentos/nuevo', [DocumentoController::class, 'nuevo'])->name('documentos.nuevo');

Route::post('/documentos/guardar', [DocumentoController::class, 'guardar'])->name('documentos.guardar');

//funcion para editar un documento almacenado en la BD
//Route::post('/documentos/{doc}/editar', [DocumentoController::class, 'editar'])->name('documento.editar');


//llamada al ingresar, tendra filtros y una tabla
Route::get('/usuarios', [UserController::class, 'listar'])->name('users.listar');
