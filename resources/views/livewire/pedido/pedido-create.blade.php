<div class="container mt-4">
    <h4>Cadastrar Pedido</h4>

    @if (session()->has('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <form wire:submit.prevent="salvar">
        <div class="mb-3">
            <label>Cliente</label>
            <select wire:model="cliente_id" class="form-select">
                <option value="">Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
            @error('cliente_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Descrição do Pedido</label>
            <input type="text" wire:model="descricao" class="form-control">
            @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Valor Total (R$)</label>
            <input type="number" step="0.01" wire:model="valor_total" class="form-control">
            @error('valor_total') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Salvar Pedido
        </button>
    </form>
</div>
