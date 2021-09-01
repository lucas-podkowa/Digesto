<?php

use App\Http\Controllers\DigestoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');



//llamada al ingresar, tendra filtros y una tabla
Route::get('/documentos', [DocumentoController::class, 'index'])->name('digesto.index');

//llamada al presionar "Nuevo Documento", mostrara un formulario vacio
Route::get('/documentos/nuevo', [DocumentoController::class, 'nuevo'])->name('documentos.nuevo');

//llamada al presionar "Nuevo Documento", mostrara un formulario vacio
Route::post('/documentos/guardar', [DocumentoController::class, 'savePdf'])->name('documentos.savePdf');

//funcion para editar un documento almacenado en la BD
//Route::post('/documentos/{doc}/editar', [DocumentoController::class, 'editar'])->name('documento.editar');




