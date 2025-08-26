<div class="content-section d-none" id="empresas-section" wire:ignore.self>
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h1 class="page-title">Gerenciamento de Empresa</h1>
                <p class="page-subtitle">Controle de usuários, perfis e permissões</p>
            </div>
            <button class="btn btn-primary" wire:click="create" data-bs-toggle="modal" data-bs-target="#empresaModal">
                <i class="bi bi-plus-lg me-2"></i>Nova Empresa
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-3">
        <div class="col-6 col-lg-3">
            <div class="stats-card">
                <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stats-value">1,247</div>
                <div class="stats-label">Total Usuários</div>
                <div class="stats-change text-success">
                    <i class="bi bi-arrow-up"></i> +12% vs mês anterior
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stats-card">
                <div class="stats-icon bg-info bg-opacity-10 text-info">
                    <i class="bi bi-file-text"></i>
                </div>
                <div class="stats-value">489</div>
                <div class="stats-label">Protocolos</div>
                <div class="stats-change text-success">
                    <i class="bi bi-arrow-up"></i> +23 hoje
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stats-card">
                <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-bell"></i>
                </div>
                <div class="stats-value">15</div>
                <div class="stats-label">Notificações</div>
                <div class="stats-change text-warning">
                    <i class="bi bi-exclamation-triangle"></i> 3 urgentes
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stats-card">
                <div class="stats-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stats-value">98.4%</div>
                <div class="stats-label">Taxa de Sucesso</div>
                <div class="stats-change text-success">
                    <i class="bi bi-arrow-up"></i> +0.8%
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Empresas -->
    <div class="card-modern">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Lista de Empresas</h5>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Buscar empresas...">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                    </div>
                    <select wire:model.live="statusFilter" class="form-select" style="width: 200px;">
                        <option value="">Todos os Status</option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Estado</th>
                            <th>Cnpj</th>
                            <th>Telefone</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->nome }}</td>
                            <td>{{ $empresa->estado }}</td>
                            <td>{{ $empresa->cnpj }}</td>
                            <td>
                                {{ $empresa->telefone }}
                            </td>
                            <td>
                                <span class="badge-status {{ $empresa->status == 'ativo'? 'badge-ativo' : 'badge-inativo' }}">
                                    {{ $empresa->status == 'ativo' ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($empresa->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <button class="btn-action" wire:click="edit('{{ $empresa->id }}')" data-bs-toggle="modal" data-bs-target="#empresaModal" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="13" class="text-center text-muted">Nenhuma empresa encontrada</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3 m-3"><span>{{ $empresas->links() }}</span></div>
        </div>
    </div>

    
        <!-- Modal Criar/Editar -->
        <div wire:ignore.self class="modal fade" id="empresaModal" tabindex="-1" aria-labelledby="empresaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content rounded-3 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $editMode ? 'Editar Empresa' : 'Nova Empresa' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.nome" class="form-control" id="nome">
                                    <label for="nome">Nome</label>
                                    @error('form.nome')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.razao_social" class="form-control" id="razao_social">
                                    <label for="razao_social">Razão Social</label>
                                    @error('form.razao_social')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.cnpj" class="form-control" id="cnpj">
                                    <label for="cnpj">CNPJ</label>
                                    @error('form.cnpj')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.inscricao_estadual" class="form-control" id="inscricao_estadual">
                                    <label for="inscricao_estadual">Inscrição Estadual</label>
                                    @error('form.inscricao_estadual')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.telefone" class="form-control" id="telefone">
                                    <label for="telefone">Telefone</label>
                                    @error('form.telefone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="email" wire:model="form.email" class="form-control" id="email">
                                    <label for="email">Email</label>
                                    @error('form.email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.endereco" class="form-control" id="endereco">
                                    <label for="endereco">Endereço</label>
                                    @error('form.endereco')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" wire:model="form.cidade" class="form-control" id="cidade">
                                    <label for="cidade">Cidade</label>
                                    @error('form.cidade')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-3">
                                    <input type="text" wire:model="form.estado" class="form-control" id="estado">
                                    <label for="estado">Estado</label>
                                    @error('form.estado')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        
                                <div class="form-floating mb-3 col-md-3">
                                    <input type="text" wire:model="form.cep" class="form-control" id="cep">
                                    <label for="cep">CEP</label>
                                    @error('form.cep')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>       
        
        
                                <div class="form-floating mb-3 col-md-6">
                                    <select class="form-control" wire:model.defer="form.status">
                                        <option value="">Selecione</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select>
                                    <label class="form-check-label" for="status">Ativo</label>
                                    @error('form.status')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
        

                            </div>
                        </div>
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">
                                {{ $editMode ? 'Atualizar' : 'Salvar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
</div>