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
Route::get('/', [NoteController::class, 'index'])->name('home');
// CRUD
Route::post('mostrar', [NoteController::class, 'mostrar']);
Route::post('crear', [NoteController::class, 'crear']);
Route::post('borrar', [NoteController::class, 'borrar']);
Route::post('modificar', [NoteController::class, 'modificar']);