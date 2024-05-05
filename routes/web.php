<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AlugueisController;

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
    return view('index');
});
Route::prefix('livros')->group(function () {
    Route::get('/', [LivrosController::class, 'index'])->name('livros.index');
    Route::delete('/delete', [LivrosController::class, 'delete'])->name('livro.delete');
    //create
    Route::get('/cadastrarLivro', [LivrosController::class, 'cadastrarLivro'])->name('cadastrar.livro');
    Route::post('/cadastrarLivro', [LivrosController::class, 'cadastrarLivro'])->name('cadastrar.livro');
    //update
    Route::get('/atualizarLivro/{id}', [LivrosController::class, 'atualizarLivro'])->name('atualizar.livro');
    Route::put('/atualizarLivro/{id}', [LivrosController::class, 'atualizarLivro'])->name('atualizar.livro');
});
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::delete('/delete', [UsuariosController::class, 'delete'])->name('usuario.delete');
    //create
    Route::get('/cadastrarUsuario', [UsuariosController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    Route::post('/cadastrarUsuario', [UsuariosController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    //update
    Route::get('/atualizarUsuario/{id}', [UsuariosController::class, 'atualizarUsuario'])->name('atualizar.usuario');
    Route::put('/atualizarUsuario/{id}', [UsuariosController::class, 'atualizarUsuario'])->name('atualizar.usuario');
});
