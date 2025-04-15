<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-cart-plus me-2"></i>Novo Pedido</h4>
            <a href="{{ route('pedidos.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><i class="bi bi-person"></i> Cliente:</label>
                    <select wire:model="cliente_id" class="form-select">
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label"><i class="bi bi-credit-card"></i> Forma de Pagamento:</label>
                    <select wire:model="forma_pagamento" class="form-select">
                        <option value="">Escolha a forma de pagamento</option>
                        <option value="crédito">Cartão de Crédito</option>
                        <option value="débito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                </div>
            </div>

            <hr>

            <h5 class="mb-3"><i class="bi bi-plus-circle"></i> Adicionar Produto</h5>

            <div class="row align-items-end mb-3">
                <div class="col-md-6">
                    <label class="form-label">Produto</label>
                    <select wire:model="produtoSelecionado" class="form-select">
                        <option value="">Selecione...</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }} - R$ {{ number_format($produto->valor, 2, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Quantidade</label>
                    <input type="number" min="1" wire:model="quantidade" class="form-control">
                </div>

                <div class="col-md-3">
                    <button wire:click="adicionarItem" class="btn btn-outline-success w-100">
                        <i class="bi bi-plus-circle-fill"></i> Adicionar
                    </button>
                </div>
            </div>

            <h5 class="mb-3"><i class="bi bi-list-check"></i> Itens do Pedido</h5>

            @if(count($itens) > 0)
                <ul class="list-group mb-3">
                    @foreach($itens as $index => $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $item['nome'] }}</strong> (x{{ $item['quantidade'] }})
                                <small class="text-muted"> - R$ {{ number_format($item['preco_unitario'], 2, ',', '.') }}</small>
                            </div>
                            <button wire:click="removerItem({{ $index }})" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-muted mb-3"><i class="bi bi-exclamation-circle"></i> Nenhum item adicionado.</div>
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><i class="bi bi-percent"></i> Desconto (opcional)</label>
                    <input type="number" wire:model="valor_desconto" step="0.01" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label"><i class="bi bi-cash-coin"></i> Valor Total</label>
                    <div class="form-control bg-light fw-bold">
                        R$ {{ number_format($valor_total, 2, ',', '.') }}
                    </div>
                </div>
            </div>

            <button wire:click="salvarPedido" class="btn btn-success w-100">
                <i class="bi bi-save"></i> Salvar Pedido
            </button>
        </div>
    </div>
</div>
