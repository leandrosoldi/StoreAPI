<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
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

Route::get('/', [PedidoController::class,'list']);

Route::get('/pedidos', [PedidoController::class,'list']);

Route::get('/clientes', [ClienteController::class,'list']);

Route::post('/payment',[PedidoController::class,'paymentPagCompleto'])->name('payment');

Route::get('/reset', [PedidoController::class,'resetDB']);