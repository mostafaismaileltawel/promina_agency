<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 
Route::get('/', [AlbumController::class,  'all_album'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class,  'create'])->name('albums.create');
Route::post('/albums', [AlbumController::class,  'store'])->name('albums.store');
Route::get('/albums/{album}', [AlbumController::class,  'show'])->name('albums.show');
Route::get('/albums/{album}/edit', [AlbumController::class,  'edit'])->name('albums.edit');
Route::put('/albums/{album}', [AlbumController::class,  'update'])->name('albums.update');
Route::delete('/albums/{album}', [AlbumController::class,  'destroy'])->name('albums.delete');
Route::get('/photo/{album}',[AlbumController::class,'createphoto'])->name('albums.create-photo');
Route::post('/albums/{album}/photo', [AlbumController::class,  'addPhoto'])->name('albums.add-photo');
Route::delete('/albums/delet_all/{album}', [AlbumController::class,  'deletePhotos'])->name('albums.delete-photos');
Route::post('/albums/{album}', [AlbumController::class,  'movePhotos'])->name('albums.move-photos');
