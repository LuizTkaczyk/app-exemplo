<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

//import para usar a rota index
use App\Http\Controllers\EventoController;

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

// usando EventoController vindo de controllers
Route::get('/', [EventoController::class, 'index']);
Route::get('/eventos/criar', [EventoController::class, 'criar'])->middleware('auth');
Route::get('/eventos/{id}', [EventoController::class, 'show']);
Route::post('/eventos', [EventoController::class, 'store']);

Route::get('/contato', [EventoController::class, 'contato']);

//acessa a dash somente se estiver autenticado
Route::get('/dashboard', [EventoController::class, 'dashboard'])->middleware('auth');

//rota para deletar um evento
Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->middleware('auth');

//rota para editar um evento
Route::get('/eventos/edit/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::put('/eventos/update/{id}', [EventoController::class, 'update'])->middleware('auth');

//rota para participar de um evento
Route::post('/eventos/join/{id}', [EventoController::class, 'joinEvent'])->middleware('auth');

Route::delete('/eventos/leave/{id}', [EventoController::class, 'leaveEvent'])->middleware('auth');



//rota exluida e movida para eventos
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
