<div class="container mt-4">
    <h2><i class="bi bi-plus-circle"></i> Novo Produto</h2>

    @if (session()->has('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="nome" class="form-label"><i class="bi bi-card-text"></i> Nome</label>
            <input type="text" id="nome" class="form-control" wire:model.defer="nome">
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="ingredientes" class="form-label"><i class="bi bi-list-check"></i> Ingredientes</label>
            <textarea id="ingredientes" class="form-control" wire:model.defer="ingredientes"></textarea>
            @error('ingredientes') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label"><i class="bi bi-currency-dollar"></i> Valor</label>
            <input type="number" step="0.01" id="valor" class="form-control" wire:model.defer="valor">
            @error('valor') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label"><i class="bi bi-image"></i> Imagem</label>
            <input type="file" id="imagem" class="form-control" wire:model="imagem">
            @error('imagem') <small class="text-danger">{{ $message }}</small> @enderror

            @if ($imagem)
                <div class="mt-3">
                    <strong>Preview:</strong><br>
                    <img src="{{ $imagem->temporaryUrl() }}" class="img-thumbnail" style="max-height: 200px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Salvar Produto
        </button>
    </form>
</div>
