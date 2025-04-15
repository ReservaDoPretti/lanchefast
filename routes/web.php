<?php

use Illuminate\Support\Facades\Route;

// Clientes
use App\Livewire\Clientes\Index as ClienteIndex;
use App\Livewire\Clientes\Create as ClienteCreate;
use App\Livewire\Clientes\Show as ClienteShow;
use App\Livewire\Clientes\Edit as ClienteEdit;

// Produtos
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use App\Livewire\Produto\ProdutoShow;

Route::prefix('clientes')->group(function () {

    Route::get('/', \App\Livewire\Clientes\Index::class)->name('clientes.index');
    Route::get('/create', \App\Livewire\Clientes\Create::class)->name('clientes.create');
    Route::get('/{cliente}', \App\Livewire\Clientes\Show::class)->name('clientes.show');  
    Route::get('/{cliente}/edit', \App\Livewire\Clientes\Edit::class)->name('clientes.edit');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', ProdutoIndex::class)->name('produtos.index');
    Route::get('/create', ProdutoCreate::class)->name('produtos.create');
    Route::get('/{produto}', ProdutoShow::class)->name('produtos.show');
    Route::get('/{produto}/edit', ProdutoEdit::class)->name('produtos.edit');
});


Route::get('/pedidos/create', \App\Livewire\Pedido\PedidoCreate::class);
