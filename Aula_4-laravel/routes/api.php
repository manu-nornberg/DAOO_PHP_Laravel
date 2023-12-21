<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('show/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('pedido', [PedidoController::class, 'index'])->name('pedido.index');
Route::get('user',[UserController::class, 'index'])->name('user.index');

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::put('produto/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('produto/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('pedido', [PedidoController::class, 'store'])->name('pedido.store');
    Route::put('pedido/{pedido}', [PedidoController::class, 'update'])->name('pedido.update');
    Route::delete('pedido/{pedido}', [PedidoController::class, 'destroy'])->name('pedido.destroy');
    Route::get('pedido/{id}/user', [PedidoController::class, ''])->name('user.pedido');
});

Route::middleware(['auth:sanctum', 'role:manager'])->group(function () {
    Route::post('produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('pedido/{id}/user', [PedidoController::class, ''])->name('user.pedido');
});

Route::middleware('auth:sanctum', 'role:client')->group(function () {
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
});

Route::post('login',[LoginController::class, 'login'])
    ->name('login');
