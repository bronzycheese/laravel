<div class="content-section d-none" id="cidades-section" wire:ignore.self>
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h1 class="page-title">Gerenciamento de Cidade</h1>
                <p class="page-subtitle">Controle de usuários, perfis e permissões</p>
            </div>
            <button class="btn btn-primary" wire:click="create" data-bs-toggle="modal" data-bs-target="#cidadeModal">
                <i class="bi bi-plus-lg me-2"></i>Nova Cidade
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
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

    <!-- Lista de Cidades -->
    <div class="card-modern">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Lista de Cidades</h5>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Buscar cidades...">
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
                            <th>Slug</th>
                            <th>Site</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cidades as $cidade)
                        <tr>
                            <td>{{ $cidade->nome }}</td>
                            <td>{{ $cidade->estado }}</td>
                            <td>{{ $cidade->slug }}</td>
                            <td>
                                @if($cidade->site)
                                    <a href="{{ $cidade->site }}" target="_blank">{{ $cidade->site }}</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td>
                                <span class="badge-status {{ $cidade->status == 'ativo' ? 'badge-ativo' : 'badge-inativo' }}">
                                    {{ $cidade->status }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($cidade->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <button class="btn-action" wire:click="edit('{{ $cidade->id }}')" data-bs-toggle="modal" data-bs-target="#cidadeModal" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="13" class="text-center text-muted">Nenhuma cidade encontrada</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3 m-3"><span>{{ $cidades->links() }}</span></div>
        </div>
    </div>

    
        <!-- Modal Criar/Editar -->
        <div wire:ignore.self class="modal fade" id="cidadeModal" tabindex="-1" aria-labelledby="cidadeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content rounded-3 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $editMode ? 'Editar Cidade' : 'Nova Cidade' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control" wire:model.defer="form.nome">
                                    @error('form.nome') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-3">
                                    <label class="form-label">Estado (UF)</label>
                                    <input type="text" class="form-control" maxlength="2" wire:model.defer="form.estado">
                                    @error('form.estado') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" wire:model.defer="form.slug" disabled readonly>
                                    @error('form.slug') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Nome Banco de Dados</label>
                                    <input type="text" class="form-control" wire:model.defer="form.nome_banco_dados">
                                    @error('form.nome_banco_dados') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Brasão (URL)</label>
                                    <input type="url" class="form-control" wire:model.defer="form.brasao">
                                    @error('form.brasao') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Logo Prefeitura (URL)</label>
                                    <input type="url" class="form-control" wire:model.defer="form.logo_prefeitura">
                                    @error('form.logo_prefeitura') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Cor Principal</label>
                                    <input type="color" class="form-control form-control-color" style="width: 100%; height: 63%; padding: 10px;"  wire:model.defer="form.cor_principal">
                                    @error('form.cor_principal') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Telefone Prefeitura</label>
                                    <input type="text" class="form-control" wire:model.defer="form.telefone_prefeitura">
                                    @error('form.telefone_prefeitura') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">E-mail Ouvidoria</label>
                                    <input type="email" class="form-control" wire:model.defer="form.email_ouvidoria">
                                    @error('form.email_ouvidoria') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Site</label>
                                    <input type="url" class="form-control" wire:model.defer="form.site">
                                    @error('form.site') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
    
                                <div class="col-md-6">
                                    <label class="form-label">Ativo</label>
                                    <select class="form-control" wire:model.defer="form.status">
                                        <option>Selecione</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select>
                                    @error('form.status') <span class="text-danger small">{{ $message }}</span> @enderror
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