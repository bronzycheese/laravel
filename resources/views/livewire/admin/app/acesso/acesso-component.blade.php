<div class="content-section d-none" id="acessos-section"  wire:ignore.self>
    <div class="page-header">
        <h1 class="page-title">Acessos</h1>
        <p class="page-subtitle">Visão geral do sistema de gestão</p>
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

    <!-- Recent Activity -->
    <div class="card-modern" hidden>
        <div class="card-header">
            <h5 class="mb-0">Atividades Recentes</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-modern">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Ação</th>
                            <th>Protocolo</th>
                            <th>Data</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-avatar" style="width: 32px; height: 32px;">JS</div>
                                    <div>
                                        <div class="fw-semibold">João Silva</div>
                                        <small class="text-muted">Técnico</small>
                                    </div>
                                </div>
                            </td>
                            <td>Criou novo protocolo</td>
                            <td><span class="badge bg-secondary">#1247</span></td>
                            <td>há 5 minutos</td>
                            <td><span class="badge-status badge-novo">Novo</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-avatar" style="width: 32px; height: 32px;">MS</div>
                                    <div>
                                        <div class="fw-semibold">Maria Santos</div>
                                        <small class="text-muted">Supervisora</small>
                                    </div>
                                </div>
                            </td>
                            <td>Respondeu protocolo</td>
                            <td><span class="badge bg-secondary">#1245</span></td>
                            <td>há 15 minutos</td>
                            <td><span class="badge-status badge-concluido">Concluído</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-avatar" style="width: 32px; height: 32px;">PC</div>
                                    <div>
                                        <div class="fw-semibold">Pedro Costa</div>
                                        <small class="text-muted">Operador</small>
                                    </div>
                                </div>
                            </td>
                            <td>Enviou fotos</td>
                            <td><span class="badge bg-secondary">#1246</span></td>
                            <td>há 1 hora</td>
                            <td><span class="badge-status badge-pendente">Pendente</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>