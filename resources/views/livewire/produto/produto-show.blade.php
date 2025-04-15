<div class="container mt-4">
    <h2><i class="bi bi-eye"></i> Detalhes do Produto</h2>

    <div class="card mt-3 shadow">
        <div class="row g-0">
            <div class="col-md-4">
                @if ($produto->imagem)
                    <img src="{{ asset('storage/' . $produto->imagem) }}" class="img-fluid rounded-start" alt="{{ $produto->nome }}">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height: 100%; min-height: 200px;">
                        <i class="bi bi-image text-muted fs-1"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="bi bi-card-text"></i> {{ $produto->nome }}
                    </h4>
                    <p class="card-text">
                        <i class="bi bi-list-check"></i> <strong>Ingredientes:</strong> {{ $produto->ingredientes }}
                    </p>
                    <p class="card-text">
                        <i class="bi bi-currency-dollar"></i> <strong>Valor:</strong> R$ {{ number_format($produto->valor, 2, ',', '.') }}
                    </p>

                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">
                        <i class="bi bi-arrow-left"></i> Voltar para a lista
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
