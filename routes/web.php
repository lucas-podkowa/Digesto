<?php

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

Route::get('/home', [HomeController::class, 'home'])
    ->name('home');

Route::get('/documentos', [DocumentoController::class, 'index'])
    ->name('digesto.index');


// -- DOCUMENTOS --
Route::get('/documentos/{documento}/ver', [DocumentoController::class, 'ver'])
    //->middleware('documentos.ver')
    ->name('documentos.ver');

Route::get('/documentos/nuevo', [DocumentoController::class, 'nuevo'])
    ->middleware('can:documentos.nuevo')
    ->name('documentos.nuevo');

Route::post('/documentos/guardar', [DocumentoController::class, 'guardar'])
    ->middleware('can:documentos.guardar')
    ->name('documentos.guardar');

Route::get('/documentos/{documento}/editar', [DocumentoController::class, 'editar'])
    ->middleware('can:documentos.editar')
    ->name('documentos.editar');

Route::put('/documentos/{documento}', [DocumentoController::class, 'actualizar'])
    ->name('documentos.actualizar');



// -- USUARIOS --
Route::get('/usuarios', [UserController::class, 'listar'])
    ->middleware('can:usuarios.listar')
    ->name('usuarios.listar');

Route::get('/usuarios/{user}/editar', [UserController::class, 'editar'])
    ->middleware('can:usuarios.editar')
    ->name('usuarios.editar');

Route::put('/usuarios/{user}', [UserController::class, 'actualizar'])
    ->middleware('can:usuarios.actualizar')
    ->name('usuarios.actualizar');
