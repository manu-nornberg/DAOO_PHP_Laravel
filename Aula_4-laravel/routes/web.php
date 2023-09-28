<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('casa', [HomeController::class, 'index']);

Route::get('produtos', [ProdutoController::class, 'index']);
Route::get('produtos/{id}', [ProdutoController::class, 'show']);
Route::get('produtos/{id}/update', [ProdutoController::class, 'update'])->name('produto-update');
Route::post('produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produto-edit');
Route::get('produtos/{id}/remove', [ProdutoController::class, 'remove'])->name('produto-remove');
Route::post('produtos/{id}/delete', [ProdutoController::class, 'delete'])->name('produto-delete');
Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produto/create');
