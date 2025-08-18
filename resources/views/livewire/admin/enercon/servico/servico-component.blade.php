<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Gerenciar serviços</h4>
                        </div>
                        <div class="col-md-6">
                            <button wire:click="create()" class="btn btn-primary btn-sm float-end">
                                <i class="fa fa-plus"></i> Novo serviço
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
                            <input wire:model.live="search" type="text" class="form-control" placeholder="Pesquisar serviços...">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cidade_id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>cor</th>
                                    <th>Icone</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicos as $servico)
                                    <tr>
                                        <td>{{ $servico->id }}</td>
                                        <td>{{ $servico->nome }}</td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ ucfirst($servico->tipo) }}
                                            </span>
                                        </td>
                                        <td>{{ $servico->cidade }}</td>
                                        <td>
                                            @php
                                                $statusClass = match($servico->status) {
                                                    'pendente' => 'bg-warning',
                                                    'em_andamento' => 'bg-info',
                                                    'concluido' => 'bg-success',
                                                    'cancelado' => 'bg-danger',
                                                    default => 'bg-secondary'
                                                };
                                            @endphp
                                            <span class="badge {{ $statusClass }}">
                                                {{ ucfirst(str_replace('_', ' ', $servico->status)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <button wire:click="view({{ $servico->id }})" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button wire:click="edit({{ $servico->id }})" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button wire:click="delete({{ $servico->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $servicos->links() }}
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
                                Visualizar servico
                            @else
                                {{ $servicoId ? 'Editar Srviço' : 'Novo Serviço' }}
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
                                        <input type="text" class="form-control @error('data.nome') is-invalid @enderror"
                                               wire:model="data.nome" {{ $isView ? 'readonly' : '' }}>
                                        @error('data.nome') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea class="form-control @error('data.descricao') is-invalid @enderror"
                                          wire:model="data.descricao" rows="3" {{ $isView ? 'readonly' : '' }}></textarea>
                                @error('data.descricao') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cor</label>
                                <input type="color" class="form-control @error('data.cor') is-invalid @enderror"
                                       wire:model="data.cor" {{ $isView ? 'readonly' : '' }}>
                                @error('data.cor') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Cidade_id</label>
                                        <input type="text" class="form-control @error('data.cidade_id') is-invalid @enderror"
                                               wire:model="data.cidade_id" {{ $isView ? 'readonly' : '' }}>
                                        @error('data.cidade_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select @error('data.status') is-invalid @enderror"
                                        wire:model="data.status" {{ $isView ? 'disabled' : '' }}>
                                    <option value="pendente">Pendente</option>
                                    <option value="em_andamento">Em Andamento</option>
                                    <option value="concluido">Concluído</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
                                @error('data.status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ordem</label>
                                <input type="number" class="form-control @error('data.ordem') is-invalid @enderror"
                                       wire:model="data.ordem" {{ $isView ? 'readonly' : '' }}>
                                @error('data.ordem') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Icone</label>
                                <input type="text" class="form-control @error('data.icone') is-invalid @enderror"
                                       wire:model="data.icone" {{ $isView ? 'readonly' : '' }}>
                                @error('data.icone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="string" class="form-control @error('data.telefone') is-invalid @enderror"
                                       wire:model="data.telefone" {{ $isView ? 'readonly' : '' }}>
                                @error('data.telefone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                          <div class="mb-3 col-md-2 form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="ativo" wire:model.defer="ativo">
                            <label class="form-check-label" for="ativo">Ativo</label>
                          </div>
                          <div class="mb-3 col-md-2 form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="chamada" wire:model.defer="chamada">
                            <label class="form-check-label" for="chamada">Chamada</label>
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDeleteLabel">Deletar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voce tem certeza que deseja deletar? id:{{$deleteId}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" wire:click="destroy({{$deleteId}})">Deletar</button>
      </div>
    </div>
  </div>
</div>
</div>
