<?php

namespace App\Livewire\Pedido;

use Livewire\Component;
use App\Models\Pedido;

class PedidoIndex extends Component
{
    public function render()
{
    $pedidos = Pedido::with('cliente')->latest()->get();

    return view('livewire.pedido.pedido-index', [
        'pedidos' => $pedidos
    ]);
}

}

