<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Edit extends Component
{
    public Cliente $cliente;
    public string $nome = '';
    public string $cpf = '';
    public string $email = '';
    public string $telefone = '';

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->nome = $cliente->nome;
        $this->cpf = $cliente->cpf;
        $this->email = $cliente->email;
        $this->telefone = $cliente->telefone;
    }

    public function atualizar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email',
            'telefone' => 'required|string',
        ]);

        $this->cliente->update([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'telefone' => $this->telefone,
        ]);

        session()->flash('message', 'Cliente atualizado com sucesso!');
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.edit');
    }
}
