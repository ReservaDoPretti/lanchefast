<?php

namespace App\Livewire\Pedido;

use Livewire\Component;
use App\Models\Pedido;
use App\Models\Cliente;

class PedidoCreate extends Component
{
    public $cliente_id;
    public $descricao;
    public $valor_total;

    public function salvar()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descricao' => 'required|string|max:255',
            'valor_total' => 'required|numeric|min:0',
        ]);

        Pedido::create([
            'cliente_id' => $this->cliente_id,
            'descricao' => $this->descricao,
            'valor_total' => $this->valor_total,
        ]);

        session()->flash('sucesso', 'Pedido cadastrado com sucesso!');

        // limpa o form
        $this->reset(['cliente_id', 'descricao', 'valor_total']);
    }

    public function render()
    {
        return view('livewire.pedido.pedido-create', [
            'clientes' => Cliente::all()
        ]);
    }
}
