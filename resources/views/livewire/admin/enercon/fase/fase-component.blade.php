<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Gerenciar fases</h4>
                        </div>
                        <div class="col-md-6">
                            <button wire:click="create()" class="btn btn-primary btn-sm float-end">
                                <i class="fa fa-plus"></i> Nova fase
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
                            <input wire:model.live="search" type="text" class="form-control" placeholder="Pesquisar fases...">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Numero</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fases as $fase)
                                    <tr>
                                        <td>{{ $fase->id }}</td>
                                        <td>{{ $fase->nome }}</td>
                                        <td>{{$fase->numero}}</td>
                                        <td>
                                            <button wire:click="view({{ $fase->id }})" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button wire:click="edit({{ $fase->id }})" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button wire:click="delete({{ $fase->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $fases->links() }}
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
                                Visualizar fase
                            @else
                                {{ $faseId ? 'Editar fase' : 'Novo Protocolo' }}
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
                            <div class="mb-3">
                                <label class="form-label">Dnumero</label>
                                <textarea class="form-control @error('descricao') is-invalid @enderror"
                                          wire:model="numero" rows="3" {{ $isView ? 'readonly' : '' }}></textarea>
                                @error('numero') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
