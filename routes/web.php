<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnounceController;

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

//Ruta home
Route::get('/',[HomeController::class,"index"])->name('home');

//Anuncios

//Crear Anuncios
Route::get('new/announcements',[AnnounceController::class,"create"])->name('announcements.create');
Route::post('new/announcements',[AnnounceController::class,"store"]);
//Leer Anuncios
Route::get('/announcements', [AnnounceController::class,"index"])->name("announcements.index");
Route::get('/announcements/{announcement}', [AnnounceController::class,"show"])->name("announcements.show");
//Editar Anuncios
Route::get('/announcements/{announcement}/edit', [AnnounceController::class, "edit"])->name("announcements.edit");
Route::post('/announcements/{announcement}/edit', [AnnounceController::class, "update"]);
//Eliminar Anuncios
Route::delete('/announcements/{announcement}', [AnnounceController::class, "destroy"])->name("announcements.destroy")->middleware("auth");
