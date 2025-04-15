<?php

namespace App\Livewire\Pedido;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\ItemPedido;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PedidoCreate extends Component
{
    public $cliente_id;
    public $forma_pagamento;
    public $produtos = [];
    public $produtoSelecionado;
    public $quantidade = 1;
    public $itens = [];
    public $valor_total = 0;
    public $valor_desconto = 0;

    public function mount()
    {
        $this->produtos = Produto::all();
    }

    public function adicionarItem()
    {
        if (!$this->produtoSelecionado) return;

        $produto = Produto::find($this->produtoSelecionado);

        $this->itens[] = [
            'produto_id' => $produto->id,
            'nome' => $produto->nome,
            'quantidade' => $this->quantidade,
            'preco_unitario' => $produto->valor,
        ];

        $this->recalcularTotal();
    }

    public function removerItem($index)
    {
        unset($this->itens[$index]);
        $this->itens = array_values($this->itens);
        $this->recalcularTotal();
    }

    public function recalcularTotal()
    {
        $this->valor_total = 0;
        foreach ($this->itens as $item) {
            $this->valor_total += $item['quantidade'] * $item['preco_unitario'];
        }
    }

    public function salvarPedido()
    {
        DB::beginTransaction();

        try {
            $pedido = Pedido::create([
                'cliente_id' => $this->cliente_id,
                'valor_total' => $this->valor_total,
                'valor_desconto' => $this->valor_desconto,
                'forma_pagamento' => $this->forma_pagamento,
            ]);

            foreach ($this->itens as $item) {
                ItemPedido::create([
                    'pedido_id' => $pedido->id,
                    'produto_id' => $item['produto_id'],
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $item['preco_unitario'],
                ]);
            }

            DB::commit();
            session()->flash('success', 'Pedido criado com sucesso!');
            return redirect()->route('pedidos.index');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Erro ao salvar pedido.');
        }
    }

    public function getValorTotalProperty()
{
    $total = 0;

    foreach ($this->itens as $item) {
        $total += $item['quantidade'] * $item['preco_unitario'];
    }

    // Aplica desconto se houver
    if ($this->valor_desconto && $this->valor_desconto > 0) {
        $total -= $this->valor_desconto;
    }

    return max($total, 0); // Garante que o valor não seja negativo
}


    public function render()
    {
        return view('livewire.pedido.pedido-create', [
            'clientes' => \App\Models\Cliente::all(),
        ]);
    }
}

