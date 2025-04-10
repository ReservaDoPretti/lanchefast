<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-person-circle"></i> Detalhes do Cliente</h5>
            <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Nome:</label>
                <div>{{ $cliente->nome }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold"><i class="bi bi-credit-card-2-front"></i> CPF:</label>
                <div>{{ $cliente->cpf }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold"><i class="bi bi-envelope-fill"></i> Email:</label>
                <div>{{ $cliente->email }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold"><i class="bi bi-telephone-fill"></i> Telefone:</label>
                <div>{{ $cliente->telefone }}</div>
            </div>

            <div class="text-end">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>
