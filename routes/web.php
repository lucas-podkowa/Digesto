<?php

use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
})->name('welcome');

// Rutas de autenticación
Auth::routes();

// Grupo de rutas para Convenios
Route::prefix('convenios')->group(function () {
    Route::get('/', [ConvenioController::class, 'index'])->name('convenios.index');
    Route::get('/{convenio}/ver', [ConvenioController::class, 'ver'])->name('convenios.ver');


    Route::middleware('can:convenios.nuevo')->group(function () {
        Route::get('/nuevo', [ConvenioController::class, 'nuevo'])->name('convenios.nuevo');
    });

    Route::middleware('can:convenios.guardar')->group(function () {
        Route::post('/guardar', [ConvenioController::class, 'guardar'])->name('convenios.guardar');
    });

    Route::middleware('can:convenios.editar')->group(function () {
        Route::get('/{convenio}/editar', [ConvenioController::class, 'editar'])->name('convenios.editar');
    });

    Route::put('/{convenio}', [ConvenioController::class, 'actualizar'])->name('convenios.actualizar');
});


// Grupo de rutas para documentos
Route::prefix('documentos')->group(function () {
    Route::get('/', [DocumentoController::class, 'index'])->name('digesto.index');
    Route::get('/{documento}/ver', [DocumentoController::class, 'ver'])->name('documentos.ver');


    Route::middleware('can:documentos.nuevo')->group(function () {
        Route::get('/nuevo', [DocumentoController::class, 'nuevo'])->name('documentos.nuevo');
    });

    Route::middleware('can:documentos.guardar')->group(function () {
        Route::post('/guardar', [DocumentoController::class, 'guardar'])->name('documentos.guardar');
    });

    Route::middleware('can:documentos.editar')->group(function () {
        Route::get('/{documento}/editar', [DocumentoController::class, 'editar'])->name('documentos.editar');
    });

    Route::put('/{documento}', [DocumentoController::class, 'actualizar'])->name('documentos.actualizar');
});

// Grupo de rutas para usuarios con middleware
Route::prefix('usuarios')->middleware('can:usuarios.listar')->group(function () {
    Route::get('/', [UserController::class, 'listar'])->name('usuarios.listar');

    Route::middleware('can:usuarios.editar')->group(function () {
        Route::get('/{user}/editar', [UserController::class, 'editar'])->name('usuarios.editar');
    });

    Route::middleware('can:usuarios.actualizar')->group(function () {
        Route::put('/{user}', [UserController::class, 'actualizar'])->name('usuarios.actualizar');
    });
});

// Route::get('/home', [HomeController::class, 'home'])
//     ->name('home');

// Route::get('/documentos', [DocumentoController::class, 'index'])
//     ->name('digesto.index');

// Route::get('/documentos/{documento}/qr', [DocumentoController::class, 'generar_qr'])
//     //->middleware('can:usuarios.listar')
//     ->name('documentos.qr');

// // -- DOCUMENTOS --
// Route::get('/documentos/{documento}/ver', [DocumentoController::class, 'ver'])
//     //->middleware('documentos.ver')
//     ->name('documentos.ver');

// Route::get('/documentos/nuevo', [DocumentoController::class, 'nuevo'])
//     ->middleware('can:documentos.nuevo')
//     ->name('documentos.nuevo');

// Route::post('/documentos/guardar', [DocumentoController::class, 'guardar'])
//     ->middleware('can:documentos.guardar')
//     ->name('documentos.guardar');

// Route::get('/documentos/{documento}/editar', [DocumentoController::class, 'editar'])
//     ->middleware('can:documentos.editar')
//     ->name('documentos.editar');

// Route::put('/documentos/{documento}', [DocumentoController::class, 'actualizar'])
//     ->name('documentos.actualizar');



// -- USUARIOS --
// Route::get('/usuarios', [UserController::class, 'listar'])
//     ->middleware('can:usuarios.listar')
//     ->name('usuarios.listar');

// Route::get('/usuarios/{user}/editar', [UserController::class, 'editar'])
//     ->middleware('can:usuarios.editar')
//     ->name('usuarios.editar');

// Route::put('/usuarios/{user}', [UserController::class, 'actualizar'])
//     ->middleware('can:usuarios.actualizar')
//     ->name('usuarios.actualizar');

// -- QR --
//Route::get('/usuarios', [CertificadoController::class, 'generar_qr'])
//    //->middleware('can:usuarios.listar')
//    ->name('certificado.generarQR');
