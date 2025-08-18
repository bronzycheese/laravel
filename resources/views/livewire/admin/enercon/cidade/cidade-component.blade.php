<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Gerenciar Cidades</h4>
                        </div>
                        <div class="col-md-6">
                            <button wire:click="create()" class="btn btn-primary btn-sm float-end">
                                <i class="fa fa-plus"></i> Nova Cidade
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input wire:model.live="search" type="text" class="form-control" placeholder="Pesquisar cidades...">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>estado</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cidades as $cidade)
                                    <tr>
                                        <td>{{ $cidade->id }}</td>
                                        <td>{{ $cidade->nome }}</td>
                                        <td>{{ $cidade->estado }}</td>
                                        <td>
                                            <span class="badge {{ $cidade->status == 'ativa' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($cidade->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <button wire:click="view({{ $cidade->id }})" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button wire:click="edit({{ $cidade->id }})" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button wire:click="delete({{ $cidade->id }})" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja deletar esta cidade?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $cidades->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($isOpen)
        <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($isView)
                                Visualizar Cidade
                            @else
                                {{ $cidadeId ? 'Editar Cidade' : 'Nova Cidade' }}
                            @endif
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal()"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                               wire:model="nome" {{ $isView ? 'readonly' : '' }}>
                                        @error('nome') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror"
                                                wire:model="status" {{ $isView ? 'disabled' : '' }}>
                                            <option value="ativo">Ativa</option>
                                            <option value="inativo">Inativa</option>
                                        </select>
                                        @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Estado</label>
                                        <input type="text" class="form-control @error('estado') is-invalid @enderror"
                                               wire:model="estado" {{ $isView ? 'readonly' : '' }}>
                                        @error('estado') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal()">Fechar</button>
                        @if(!$isView)
                            <button type="button" class="btn btn-primary" wire:click="store()">Salvar</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
