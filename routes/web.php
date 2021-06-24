<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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
Route::get('/',[PublicController::class,"index"])->name('home');
//Anuncios relacionados con categorias
Route::get('/category/{id}/announcements', [PublicController::class, "AnnouncementsByCategory"])->name('category.announcements');

//Ruta de usuario revisor
Route::get('/revisor',[RevisorController::class,"index"])->name("revisor.home");
//Aceptar y rechazar anuncio revisor
Route::post('/revisor/announcement/{id}/accept',[RevisorController::class,'accept'])->name('revisor.announcement.accept');
Route::post('/revisor/announcement/{id}/reject',[RevisorController::class,'reject'])->name('revisor.announcement.reject');



// -- Anuncios Por usuario --
//Crear Anuncios
Route::get('/new/announcements', [AnnounceController::class, "create"])->name('announcements.create')->middleware("auth");
Route::post('/new/announcements', [AnnounceController::class, "store"])->middleware("auth");
//Leer Anuncios (El usuario lee los suyos)
Route::get('/announcements', [AnnounceController::class,"index"])->name("announcements.index");
Route::get('/announcements/{announcement}', [AnnounceController::class,"show"])->name("announcements.show");
//Editar Anuncios
Route::get('/announcements/{announcement}/edit', [AnnounceController::class, "edit"])->name("announcements.edit")->middleware("auth");
Route::post('/announcements/{announcement}/edit', [AnnounceController::class, "update"])->middleware("auth");
//Eliminar Anuncios
Route::delete('/announcements/{announcement}', [AnnounceController::class, "destroy"])->name("announcements.destroy")->middleware("auth");
