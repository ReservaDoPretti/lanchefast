<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">
                <i class="bi bi-person-plus-fill"></i> Novo Cliente
            </h4>

            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person"></i> Nome</label>
                    <input type="text" wire:model="nome" class="form-control">
                    @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-house"></i> Endereço</label>
                    <input type="text" wire:model="endereco" class="form-control">
                    @error('endereco') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-telephone"></i> Telefone</label>
                    <input type="text" wire:model="telefone" class="form-control">
                    @error('telefone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-credit-card"></i> CPF</label>
                    <input type="text" wire:model="cpf" class="form-control">
                    @error('cpf') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-lock"></i> Senha</label>
                    <input type="senha" wire:model="senha" class="form-control">
                    @error('senha') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Voltar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
