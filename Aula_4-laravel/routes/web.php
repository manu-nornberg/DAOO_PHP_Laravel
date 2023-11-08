P<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TransportadoraController;
use App\Models\User;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('produtos', [ProdutoController::class, 'index']);
Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produto/create');
Route::post('produtos/store', [ProdutoController::class, 'store'])->name('produto/store');
Route::get('produtos/{id}', [ProdutoController::class, 'show']);
Route::get('produtos/{id}/update', [ProdutoController::class, 'update'])->name('produto-update');
Route::post('produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produto-edit');
Route::get('produtos/{id}/remove', [ProdutoController::class, 'remove'])->name('produto-remove');
Route::get('produtos/{id}/delete', [ProdutoController::class, 'delete'])->name('produto-delete');

Route::get('users', [UsuarioController::class, 'index']);
Route::get('users/create', [UsuarioController::class, 'create'])->name('usuario/create');
Route::post('users/store', [UsuarioController::class, 'store'])->name('usuario/store');
Route::get('users/{id}', [UsuarioController::class, 'show']);
Route::get('users/{id}/update', [UsuarioController::class, 'update'])->name('usuario-update');
Route::post('users/{id}/edit', [UsuarioController::class, 'edit'])->name('usuario-edit');
Route::get('users/{id}/remove', [UsuarioController::class, 'remove'])->name('usuario-remove');
Route::get('users/{id}/delete', [UsuarioController::class, 'delete'])->name('usuario-delete');

Route::get('transportadoras', [TransportadoraController::class, 'index']);
Route::get('transportadoras/create', [TransportadoraController::class, 'create'])->name('transportadora/create');
Route::post('transportadoras/store', [TransportadoraController::class, 'store'])->name('transportadora/store');
Route::get('transportadoras/{id}', [TransportadoraController::class, 'show']);
Route::get('transportadoras/{id}/update', [TransportadoraController::class, 'update'])->name('transportadora-update');
Route::post('transportadoras/{id}/edit', [TransportadoraController::class, 'edit'])->name('transportadora-edit');
Route::get('transportadoras/{id}/remove', [TransportadoraController::class, 'remove'])->name('transportadora-remove');
Route::get('transportadoras/{id}/delete', [TransportadoraController::class, 'delete'])->name('transportadora-delete');


