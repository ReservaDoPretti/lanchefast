<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="bi bi-receipt"></i> Lista de Pedidos</h2>
        <a href="{{ route('pedidos.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Novo Pedido
        </a>
    </div>

    <table class="table table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th><i class="bi bi-person-fill"></i> Cliente</th>
                <th><i class="bi bi-card-text"></i> Descrição</th>
                <th><i class="bi bi-currency-dollar"></i> Valor Total</th>
                <th><i class="bi bi-calendar-event"></i> Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->cliente->nome }}</td>
                    <td>{{ $pedido->descricao }}</td>
                    <td>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
