<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RecognitionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('singup',[UsuarioController::class,'singup'])->name('crearUsuario');
Route::post('login',[UsuarioController::class,'login'])->name('loginUsuario');
Route::post('registro/{numero}',[UsuarioController::class,'fotoUsuario'])->name('fotoUsuario');
Route::post('buscar_foto/{id}/{id_evento}',[RecognitionController::class,'buscarSimilitudes'])->name('buscador');

Route::post('buscar',[RecognitionController::class,'retornarEvento'])->name('buscarEvento');
Route::post('album',[RecognitionController::class,'retornarAlbum'])->name('buscarAlbum');

Route::post('prueba',[UsuarioController::class,'prueba'])->name('prueba');
