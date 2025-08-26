<div class="content-section d-none" id="configuracoes-section">
    <div class="page-header">
        <h1 class="page-title">Configurações do Sistema</h1>
        <p class="page-subtitle">Preferências gerais e configurações avançadas</p>
    </div>

    <div class="row g-4">


        <!-- System Settings -->
        <div class="col-lg-6">
            <div class="card-modern">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-gear me-2"></i>Configurações Gerais</h5>
                </div>
                <div class="card-body p-4">

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
        
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome</label>
                        <input type="text" class="form-control" wire:model="nome">
                        @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label fw-semibold">API</label>
                        <input type="text" class="form-control" wire:model="api">
                        @error('api') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Logo</label>
                        <input type="text" class="form-control" wire:model="logo" placeholder="logos/enercon.png">
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descrição</label>
                        <textarea class="form-control" wire:model="descricao"></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Cor</label>
                        <input type="color" class="form-control form-control-color" wire:model="cor" style="width: 100%;  padding: 10px;">
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ícone</label>
                        <input type="text" class="form-control" wire:model="icone" placeholder="ex: cogs">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fw-semibold">Ativo</div>
                            <small class="text-muted">Ativar ou Anitivar</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" id="ativo" wire:model="ativo">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fw-semibold">Tema Escuro</div>
                            <small class="text-muted">Alternar entre tema claro e escuro</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" id="darkModeToggle">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fw-semibold">Notificações por E-mail</div>
                            <small class="text-muted">Receber alertas por e-mail</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-semibold">Auto-salvar</div>
                            <small class="text-muted">Salvamento automático de formulários</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" wire:click="save">
                            <i class="bi bi-save me-1"></i> Salvar Configurações
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- System Info -->
        <div class="col-lg-6">
            <div class="card-modern">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Informações do Sistema</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 mb-1 text-success">99.8%</div>
                                <small class="text-muted">Uptime</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 mb-1 text-info">v2.1.4</div>
                                <small class="text-muted">Versão</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 mb-1 text-primary">45ms</div>
                                <small class="text-muted">Latência</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 mb-1 text-warning">2.1GB</div>
                                <small class="text-muted">Armazenamento</small>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Última Atualização:</span>
                            <span class="text-muted">10/08/2024</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Próxima Manutenção:</span>
                            <span class="text-muted">15/08/2024</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Servidor:</span>
                            <span class="badge bg-success">Online</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="card-modern mt-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-shield-check me-2"></i>Segurança</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fw-semibold">Autenticação de Dois Fatores</div>
                            <small class="text-muted">Segurança adicional para login</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fw-semibold">Log de Atividades</div>
                            <small class="text-muted">Registrar todas as ações</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-semibold">Bloqueio Automático</div>
                            <small class="text-muted">Após 30 min de inatividade</small>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>