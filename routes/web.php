<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuAdministradorController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\RecognitionController;
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

Route::get('/',[AdminController::class,'welcome'])->name('home');

Route::get('/prueba',function(){
    return view('prueba');
});


Route::get('/admin',[AdminController::class,'loginVista'])->name('vistalogin');
Route::post('/admin',[AdminController::class,'login'])->name('login');
Route::post('/logout',[AdminController::class,'logout'])->name('logout');

Route::get('/menuAdministrador',[MenuAdministradorController::class,'vistaMenu'])->middleware('auth:administrador')->name('vistaMenu');
Route::get('/fotografias',[MenuAdministradorController::class,'insertar'])->middleware('auth:administrador')->name('vistaSubir');
Route::get('/evento',[MenuAdministradorController::class,'crear'])->middleware('auth:administrador')->name('vistaEvento');
Route::post('/evento',[MenuAdministradorController::class,'crear_evento'])->middleware('auth:administrador')->name('crearEvento');

Route::post('/subir',[FotoController::class,'subir_fotos'])->middleware('auth:administrador')->name('subirFoto');
Route::get('/album/{id}',[FotoController::class,'album'])->middleware('auth:administrador')->name('verAlbum');
Route::get('/album/{id}/{foto}','FotoController@foto')->middleware('auth:administrador')->name('verFoto');

Route::get('/{id}',[FotoController::class,'foto2'])->name('Foto');

