<div class="col-lg-9 col-xl-10 p-0">
    <div class="main-content">
        <!-- Top Navbar -->
        @includeIf('admin.app.layouts.navbar')
        
        <!-- Content Area -->
        <div class="content-area">
            <!-- Dashboard Section -->
            <livewire:admin.app.dashboard.dashboard-component />

                      
            <!-- Configurações Section -->
            <livewire:admin.app.configuracao.configuracao-component />

              <!-- Empresas Section -->
              <livewire:admin.app.empresa.empresa-component />

              <livewire:admin.app.cidade.cidade-component />




            <div class="content-section d-none" id="app-section">
                <div class="page-header">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h1 class="page-title">Central de Notificações</h1>
                            <p class="page-subtitle">Alertas e comunicações do sistema</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary">
                                <i class="bi bi-check2-all me-2"></i>Marcar Todas como Lidas
                            </button>
                            <button class="btn btn-primary">
                                <i class="bi bi-plus-lg me-2"></i>Nova Notificação
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Notification Statistics -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="stats-value">3</div>
                            <div class="stats-label">Urgentes</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-info bg-opacity-10 text-info">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <div class="stats-value">12</div>
                            <div class="stats-label">Novas</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="stats-value">45</div>
                            <div class="stats-label">Lidas Hoje</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-bell"></i>
                            </div>
                            <div class="stats-value">15</div>
                            <div class="stats-label">Não Lidas</div>
                        </div>
                    </div>
                </div>

                <div class="card-modern">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Notificações</h5>
                            <div class="d-flex gap-2">
                                <select class="form-select" style="width: 150px;">
                                    <option>Todas</option>
                                    <option>Urgentes</option>
                                    <option>Novas</option>
                                    <option>Lidas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>