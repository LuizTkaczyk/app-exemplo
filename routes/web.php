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
Route::get('/eventos/criar', [EventoController::class, 'criar']);
Route::post('/eventos', [EventoController::class, 'store']);

Route::get('/contato', [EventoController::class, 'contato']);









