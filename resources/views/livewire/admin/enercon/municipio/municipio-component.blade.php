<div class="container py-4">

    <h2 class="mb-4">Gerenciar Municípios</h2>

    <!-- Formulário -->
    <form wire:submit.prevent="salvar" class="mb-4">

        <div class="form-floating mb-3">
            <input type="text" wire:model="nome" class="form-control" id="nome" placeholder="Nome" required>
            <label for="nome">Nome</label>
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" wire:model="telefone" class="form-control" id="telefone" placeholder="Telefone">
            <label for="telefone">Telefone</label>
            @error('telefone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" wire:model="status" id="status">
            <label class="form-check-label" for="status">Ativo</label>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $modoEdicao ? 'Atualizar' : 'Salvar' }}
        </button>
        @if($modoEdicao)
            <button type="button" wire:click="resetCampos" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <!-- Tabela -->
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Status</th>
                <th width="150">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($municipios as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->telefone ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $item->status ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    <td>
                        <button wire:click="editar({{ $item->id }})" class="btn btn-warning btn-sm">Editar</button>
                        <button wire:click="excluir({{ $item->id }})" class="btn btn-danger btn-sm"
                            onclick="return confirm('Deseja excluir este município?')">Excluir</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum município cadastrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
