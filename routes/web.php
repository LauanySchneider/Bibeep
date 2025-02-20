<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;


Route::get('/', function () {
    return view('index');  // Página de apresentação
})->name('home');


Route::get('/produtos/index', [ProdutosController::class, 'index'])->name('produtos.index');  // Página principal


Route::get('/sobre', function () {
    return view('sobre');  // arquivo sobre
})->name('sobre');


Route::prefix('produtos')->name('produtos.')->group(function () {
    // Rota para listar produtos
    Route::get('index', [ProdutosController::class, 'index'])->name('index');  

    // Rota para mostrar o formulário de criação de produto
    Route::get('create', [ProdutosController::class, 'create'])->name('create');  

    // Rota para salvar um novo produto
    Route::post('store', [ProdutosController::class, 'store'])->name('store'); 

    // Rota para editar produto
    Route::get('{id}/edit', [ProdutosController::class, 'edit'])->name('edit');  

    // Rota para atualizar produto
    Route::put('{id}', [ProdutosController::class, 'update'])->name('update');  

    // Rota para excluir produto
    Route::delete('{id}', [ProdutosController::class, 'destroy'])->name('destroy');  
});

?>
