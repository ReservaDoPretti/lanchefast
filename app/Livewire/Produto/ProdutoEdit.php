<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class ProdutoEdit extends Component
{
    use WithFileUploads;

    public Produto $produto;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    public $imagem_atual;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:2048',
    ];

    public function mount(Produto $produto)
    {
        $this->produto = $produto;
        $this->nome = $produto->nome;
        $this->ingredientes = $produto->ingredientes;
        $this->valor = $produto->valor;
        $this->imagem_atual = $produto->imagem;
    }

    public function update()
    {
        $this->validate();

        if ($this->imagem) {
            if ($this->imagem_atual) {
                Storage::disk('public')->delete($this->imagem_atual);
            }
            $this->produto->imagem = $this->imagem->store('produtos', 'public');
        }

        $this->produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $this->produto->imagem,
        ]);

        session()->flash('success', 'Produto atualizado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
