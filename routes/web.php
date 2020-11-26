<?php

use App\Http\Controllers\NoteController;
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

// Default
Route::get('/', [NoteController::class, 'mostrar'])->name('home');
// CRUD
Route::get('/mostrar', [NoteController::class, 'mostrar']);
Route::get('/crear', [NoteController::class, 'crear']);
Route::delete('/borrar/{id}', [NoteController::class, 'borrar']);
Route::post('/recibir', [NoteController::class, 'recibir']);