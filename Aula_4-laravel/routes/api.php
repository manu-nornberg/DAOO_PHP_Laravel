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
// Route::get('show/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('produto/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('pedido', [PedidoController::class, 'index'])->name('pedido.index');
Route::get('user',[UserController::class, 'index'])->name('user.index');

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // Route::post('produto', [ProdutoController::class, 'store'])->name('produto.store');
    // Será sobrescrita na linha 42 e admin não poderá criar produtos ao menos que possua a role manager
    Route::put('produto/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('produto/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('pedido', [PedidoController::class, 'store'])->name('pedido.store');
    Route::put('pedido/{pedido}', [PedidoController::class, 'update'])->name('pedido.update');
    Route::delete('pedido/{pedido}', [PedidoController::class, 'destroy'])->name('pedido.destroy');
    // Route::get('pedido/{id}/user', [PedidoController::class, ''])->name('user.pedido');
    // Será sobrescrita na linha 42
});

Route::middleware(['auth:sanctum', 'role:manager'])->group(function () {
    Route::post('produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('pedido/{id}/user', [PedidoController::class, ''])->name('user.pedido');
});//Desta forma o manager sobrescreve as rotas do admin
//Poderia ter usado abilidades e carregado o array de abilidades no login
// e aqui concatenar as abilidades admin e manager, como mostram os exemplos dos slides e docs
// Será necessário relacionar a role do manager ao admin no seeder do user admin

// Route::middleware('auth:sanctum', 'role:client')->group(function () {
Route::middleware('auth:sanctum')->group(function () {//removido o middleware para verificar no controller
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    //Desta forma, qualquer usuário poderá atualizar o perfil de qualquer usuário. 
    // A não ser que tenha proteção no controller, veja a correção do UserController

    //faltou rota para visualizar user
    Route::get('user/{user}',[UserController::class, 'show'])->name('user.show');
});

Route::post('login',[LoginController::class, 'login'])
    ->name('login');
