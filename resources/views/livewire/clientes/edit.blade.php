<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Editar Cliente
            </h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong><i class="bi bi-exclamation-triangle-fill"></i> Erros encontrados:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="bi bi-x-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form wire:submit.prevent="atualizar">
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-person-fill"></i> Nome
                    </label>
                    <input type="text" class="form-control" wire:model.defer="nome" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-credit-card"></i> CPF
                    </label>
                    <input type="text" class="form-control" wire:model.defer="cpf" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-envelope-fill"></i> Email
                    </label>
                    <input type="email" class="form-control" wire:model.defer="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-telephone-fill"></i> Telefone
                    </label>
                    <input type="text" class="form-control" wire:model.defer="telefone" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Atualizar
                    </button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
