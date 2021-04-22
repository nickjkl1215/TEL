<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['web'])->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

  

});

Route::middleware(['auth'])->group(function(){
    //Clientes
    Route::get('/clientes', [HomeController::class, 'index']);
    Route::get('/clientes/novo', [HomeController::class, 'new']);
    Route::get('dashboard/edicao_user/{user}', [HomeController::class, 'Form_editar_user']);
    Route::post('clientes/adicionar', [HomeController::class, 'add']);
    Route::get('clientes/{id}/editar', [HomeController::class, 'edit']);
    Route::post('clientes/atualizar/{id}', [HomeController::class, 'update']);
    Route::delete('clientes/deletar/{id}', [HomeController::class, 'delete']);
    //Usuarios
    Route::put('dashboard/editar_user/{user}', [HomeController::class, 'editar_user'])->name('users.edicao');
    Route::get('dashboard/edicao_user/{user}', [HomeController::class, 'Form_editar_user']);
    Route::get('dashboard/deletar_user/{user}', [HomeController::class, 'delete_user']);
});

require __DIR__.'/auth.php';



