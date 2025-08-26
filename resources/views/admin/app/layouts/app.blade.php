<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enercon - Sistema de Gestão</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --bs-primary: #ffc107;
            --bs-primary-rgb: 255, 193, 7;
            --primary-orange: #ffc107;
            --primary-orange-dark: #e0a800;
            --primary-orange-light: #fff3cd;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --bg-light: #f8f9fa;
            --bg-white: #ffffff;
            --border-light: #dee2e6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
        }

        .dark-theme {
            --bs-body-bg: #0f172a;
            --bs-body-color: #f1f5f9;
            --bg-light: #1e293b;
            --bg-white: #334155;
            --text-dark: #f1f5f9;
            --text-muted: #94a3b8;
            --border-light: #475569;
        }

        * {
            transition: all 0.2s ease;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 0.875rem;
            line-height: 1.5;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .sidebar {
            min-height: 100vh;
            background: var(--bg-white);
            border-right: 1px solid var(--border-light);
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid var(--border-light);
            background: linear-gradient(135deg, var(--primary-orange), var(--primary-orange-dark));
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: white;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            backdrop-filter: blur(10px);
        }

        .brand-text {
            font-size: 1.375rem;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .nav-pills {
            padding: 1rem 0.75rem;
        }

        .nav-pills .nav-link {
            color: var(--text-muted);
            border-radius: 10px;
            margin: 0.125rem 0;
            padding: 0.875rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            border: none;
            background: transparent;
            font-weight: 500;
            position: relative;
        }

        .nav-pills .nav-link:hover {
            background: var(--primary-orange-light);
            color: var(--primary-orange-dark);
            transform: translateX(2px);
        }

        .nav-pills .nav-link.active {
            background: var(--primary-orange);
            color: white;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
            transform: translateX(4px);
        }

        .nav-pills .nav-link i {
            font-size: 1.125rem;
            width: 22px;
            text-align: center;
        }

        .main-content {
            background: var(--bg-light);
            min-height: 100vh;
        }

        .top-navbar {
            background: var(--bg-white);
            border-bottom: 1px solid var(--border-light);
            padding: 1rem 0;
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .btn-theme-toggle {
            background: transparent;
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-theme-toggle:hover {
            border-color: var(--primary-orange);
            color: var(--primary-orange);
            background: var(--primary-orange-light);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary-orange), var(--primary-orange-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .content-area {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0 0 0.25rem 0;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.975rem;
        }

        .stats-card {
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            padding: 1.75rem;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-orange), var(--primary-orange-dark));
        }

        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .stats-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.375rem;
            margin-bottom: 1.25rem;
        }

        .stats-value {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0 0 0.25rem 0;
            line-height: 1;
        }

        .stats-label {
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stats-change {
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .card-modern {
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .card-modern .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-light);
            padding: 1.5rem 1.75rem;
            font-weight: 600;
        }

        .card-modern .card-body {
            padding: 0;
        }

        .table-modern {
            margin: 0;
        }

        .table-modern thead th {
            background: var(--bg-light);
            border: none;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1.25rem 1.75rem;
        }

        .table-modern tbody td {
            border: none;
            border-bottom: 1px solid var(--border-light);
            padding: 1.25rem 1.75rem;
            color: var(--text-dark);
            vertical-align: middle;
        }

        .table-modern tbody tr:last-child td {
            border-bottom: none;
        }

        .table-modern tbody tr:hover {
            background: rgba(255, 193, 7, 0.03);
        }

        .badge-status {
            padding: 0.5rem 0.875rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.025em;
        }

        .badge-ativo {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .badge-inativo {
            background: rgba(107, 114, 128, 0.1);
            color: #6b7280;
        }

        .badge-pendente {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .badge-concluido {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .badge-novo {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info);
        }

        .badge-urgente {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .btn-action {
            padding: 0.5rem;
            border-radius: 8px;
            border: none;
            background: transparent;
            color: var(--text-muted);
            margin: 0 0.125rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
        }

        .btn-action:hover {
            background: var(--primary-orange-light);
            color: var(--primary-orange-dark);
            transform: scale(1.05);
        }

        .notification-badge {
            background: var(--danger);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -4px;
            right: -8px;
            font-weight: 600;
        }

        .protocol-image {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid var(--border-light);
        }

        .protocol-image:hover {
            border-color: var(--primary-orange);
            transform: scale(1.05);
        }

        .notification-item {
            padding: 1.25rem;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .notification-item:hover {
            background: rgba(255, 193, 7, 0.03);
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            margin: 0 0 0.25rem 0;
            color: var(--text-dark);
        }

        .notification-text {
            color: var(--text-muted);
            font-size: 0.875rem;
            margin: 0 0 0.5rem 0;
        }

        .notification-time {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .btn-primary {
            background: var(--primary-orange);
            border-color: var(--primary-orange);
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background: var(--primary-orange-dark);
            border-color: var(--primary-orange-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid var(--border-light);
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb-item.active {
            color: var(--primary-orange);
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary-orange);
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        .user-profile-card {
            background: linear-gradient(135deg, var(--primary-orange), var(--primary-orange-dark));
            border-radius: 16px;
            padding: 2rem;
            color: white;
            text-align: center;
        }

        .user-profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 1rem auto;
            border: 4px solid rgba(255,255,255,0.3);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -100%;
                width: 280px;
                z-index: 1050;
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 1.5rem 1rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .stats-card {
                padding: 1.5rem;
            }
        }

        .dark-theme .sidebar,
        .dark-theme .main-content,
        .dark-theme .top-navbar,
        .dark-theme .stats-card,
        .dark-theme .card-modern {
            background: var(--bg-white);
            border-color: var(--border-light);
        }

        .dark-theme .table-modern thead th {
            background: var(--bg-light);
        }

        .dark-theme .nav-pills .nav-link:hover {
            background-color: rgba(255, 193, 7, 0.15);
        }
    </style>
      @livewireStyles
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @includeIf('admin.app.layouts.sidebar')

            <!-- Main Content -->
            @includeIf('admin.app.layouts.content')
        </div>
    </div>

    <!-- User Profile Modal -->
    <div class="modal fade" id="userProfileModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Perfil do Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-profile-card">
                                <div class="user-profile-avatar bg-white bg-opacity-20 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person text-white" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="mb-1" id="profileName">João Silva</h5>
                                <p class="mb-3 opacity-75">Técnico Especialista</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-light btn-sm">
                                        <i class="bi bi-telephone"></i>
                                    </button>
                                    <button class="btn btn-light btn-sm">
                                        <i class="bi bi-envelope"></i>
                                    </button>
                                    <button class="btn btn-light btn-sm">
                                        <i class="bi bi-chat-dots"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="text-center p-3 bg-light rounded-3">
                                        <div class="h5 mb-1 text-primary">47</div>
                                        <small class="text-muted">Protocolos Criados</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center p-3 bg-light rounded-3">
                                        <div class="h5 mb-1 text-success">89%</div>
                                        <small class="text-muted">Taxa de Sucesso</small>
                                    </div>
                                </div>
                            </div>

                            <h6 class="fw-semibold mb-3">Informações Pessoais</h6>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" value="João Silva" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control" value="joao.silva@enercon.com" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" class="form-control" value="(11) 99999-9999" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Departamento</label>
                                    <input type="text" class="form-control" value="Manutenção" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Editar Perfil</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Protocol Details Modal -->
    <div class="modal fade" id="protocolModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Detalhes do Protocolo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-modern">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Protocolo <span id="protocolNumber">#1247</span></h6>
                                        <span class="badge-status badge-pendente">Pendente</span>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <h5 class="mb-3">Manutenção Equipamento A</h5>
                                    <p class="text-muted mb-4">Verificação rotineira de equipamento conforme cronograma de manutenção preventiva. Necessário verificar componentes principais e realizar testes de funcionamento.</p>
                                    
                                    <div class="row g-3 mb-4">
                                        <div class="col-sm-6">
                                            <div class="bg-light p-3 rounded-3">
                                                <small class="text-muted d-block">Criado por</small>
                                                <div class="fw-semibold">João Silva</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="bg-light p-3 rounded-3">
                                                <small class="text-muted d-block">Data de Criação</small>
                                                <div class="fw-semibold">12/08/2024 10:30</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="bg-light p-3 rounded-3">
                                                <small class="text-muted d-block">Prioridade</small>
                                                <span class="badge bg-warning">Alta</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="bg-light p-3 rounded-3">
                                                <small class="text-muted d-block">Prazo</small>
                                                <div class="fw-semibold text-warning">13/08/2024</div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="fw-semibold mb-3">Fotos Anexadas</h6>
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='90' viewBox='0 0 120 90'%3E%3Crect width='120' height='90' fill='%23f8f9fa' stroke='%23dee2e6' rx='8'/%3E%3Cg%3E%3Crect x='30' y='25' width='60' height='40' fill='none' stroke='%236c757d' stroke-width='2'/%3E%3Ccircle cx='45' cy='35' r='4' fill='%236c757d'/%3E%3Cpath d='m30 65 12-12 12 12 24-24' fill='none' stroke='%236c757d' stroke-width='2'/%3E%3C/g%3E%3Ctext x='60' y='80' text-anchor='middle' fill='%236c757d' font-size='10'%3EEquipamento A - Vista 1%3C/text%3E%3C/svg%3E" class="img-fluid rounded cursor-pointer" onclick="showImageModal('Equipamento A - Vista Frontal')">
                                        </div>
                                        <div class="col-4">
                                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='90' viewBox='0 0 120 90'%3E%3Crect width='120' height='90' fill='%23e3f2fd' stroke='%23bbdefb' rx='8'/%3E%3Cg%3E%3Crect x='30' y='25' width='60' height='40' fill='none' stroke='%232196f3' stroke-width='2'/%3E%3Ccircle cx='45' cy='35' r='4' fill='%232196f3'/%3E%3Cpath d='m30 65 12-12 12 12 24-24' fill='none' stroke='%232196f3' stroke-width='2'/%3E%3C/g%3E%3Ctext x='60' y='80' text-anchor='middle' fill='%232196f3' font-size='10'%3EEquipamento A - Vista 2%3C/text%3E%3C/svg%3E" class="img-fluid rounded cursor-pointer" onclick="showImageModal('Equipamento A - Vista Lateral')">
                                        </div>
                                        <div class="col-4">
                                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='90' viewBox='0 0 120 90'%3E%3Crect width='120' height='90' fill='%23fff3cd' stroke='%23ffeaa7' rx='8'/%3E%3Cg%3E%3Crect x='30' y='25' width='60' height='40' fill='none' stroke='%23f39c12' stroke-width='2'/%3E%3Ccircle cx='45' cy='35' r='4' fill='%23f39c12'/%3E%3Cpath d='m30 65 12-12 12 12 24-24' fill='none' stroke='%23f39c12' stroke-width='2'/%3E%3C/g%3E%3Ctext x='60' y='80' text-anchor='middle' fill='%23f39c12' font-size='10'%3EEquipamento A - Painel%3C/text%3E%3C/svg%3E" class="img-fluid rounded cursor-pointer" onclick="showImageModal('Equipamento A - Painel de Controle')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-modern">
                                <div class="card-header">
                                    <h6 class="mb-0">Resposta do Protocolo</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Status</label>
                                        <select class="form-select">
                                            <option>Pendente</option>
                                            <option>Em Andamento</option>
                                            <option>Concluído</option>
                                            <option>Cancelado</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Responsável</label>
                                        <select class="form-select">
                                            <option>Selecionar...</option>
                                            <option>Maria Santos</option>
                                            <option>Pedro Costa</option>
                                            <option>Ana Lima</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Observações</label>
                                        <textarea class="form-control" rows="4" placeholder="Adicione suas observações..."></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Fotos de Resposta</label>
                                        <div class="border border-2 border-dashed rounded-3 p-4 text-center">
                                            <i class="bi bi-cloud-upload text-muted" style="font-size: 2rem;"></i>
                                            <div class="mt-2">
                                                <small class="text-muted">Clique ou arraste fotos aqui</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-check-lg me-2"></i>Salvar Resposta
                                        </button>
                                        <button class="btn btn-outline-secondary">
                                            <i class="bi bi-printer me-2"></i>Imprimir Protocolo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="imageModalTitle">Visualizar Imagem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300' viewBox='0 0 400 300'%3E%3Crect width='400' height='300' fill='%23f8f9fa' stroke='%23dee2e6' rx='12'/%3E%3Cg%3E%3Crect x='100' y='75' width='200' height='150' fill='none' stroke='%236c757d' stroke-width='3'/%3E%3Ccircle cx='150' cy='125' r='15' fill='%236c757d'/%3E%3Cpath d='m100 225 40-40 40 40 80-80' fill='none' stroke='%236c757d' stroke-width='3'/%3E%3C/g%3E%3Ctext x='200' y='270' text-anchor='middle' fill='%236c757d' font-size='16'%3EImagem do Protocolo%3C/text%3E%3C/svg%3E" class="img-fluid rounded" id="modalImage">
                    <div class="mt-3">
                        <small class="text-muted">Clique e arraste para mover • Use o scroll para zoom</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="bi bi-download me-2"></i>Baixar
                    </button>
                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-share me-2"></i>Compartilhar
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Global state
        let currentTheme = 'light';
        let currentSection = 'dashboard';

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            initializeNavigation();
            initializeTheme();
            initializeSearch();
        });

        // Navigation Management
        function initializeNavigation() {
            const navLinks = document.querySelectorAll('.nav-link[data-section]');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const section = this.getAttribute('data-section');
                    showSection(section);
                    updateBreadcrumb(section);
                    
                    // Update active nav link
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Close mobile sidebar
                    if (window.innerWidth < 992) {
                        toggleSidebar();
                    }
                });
            });
        }

        function showSection(sectionName) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => section.classList.add('d-none'));
            
            // Show selected section
            const targetSection = document.getElementById(sectionName + '-section');
            if (targetSection) {
                targetSection.classList.remove('d-none');
                currentSection = sectionName;
            }
        }

        function updateBreadcrumb(section) {
            const breadcrumb = document.getElementById('breadcrumb-current');
            const sectionNames = {
                'dashboard': 'Dashboard',
                'usuarios': 'Usuários',
                'protocolos': 'Protocolos',
                'notificacoes': 'Notificações',
                'configuracoes': 'Configurações'
            };
            breadcrumb.textContent = sectionNames[section] || 'Dashboard';
        }

        // Theme Management
        function initializeTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            setTheme(savedTheme);
            
            // Sync with settings toggle
            const darkModeToggle = document.getElementById('darkModeToggle');
            if (darkModeToggle) {
                darkModeToggle.checked = savedTheme === 'dark';
                darkModeToggle.addEventListener('change', function() {
                    toggleTheme();
                });
            }
        }

        function toggleTheme() {
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
        }

        function setTheme(theme) {
            currentTheme = theme;
            const body = document.body;
            const themeIcon = document.getElementById('theme-icon');
            const darkModeToggle = document.getElementById('darkModeToggle');
            
            if (theme === 'dark') {
                body.classList.add('dark-theme');
                themeIcon.className = 'bi bi-sun';
                if (darkModeToggle) darkModeToggle.checked = true;
            } else {
                body.classList.remove('dark-theme');
                themeIcon.className = 'bi bi-moon';
                if (darkModeToggle) darkModeToggle.checked = false;
            }
            
            try {
                localStorage.setItem('theme', theme);
            } catch (e) {
                // Ignore localStorage errors in restricted environments
            }
        }

        // Mobile Sidebar Management
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('d-none');
        }

        // Search Functionality
        function initializeSearch() {
            const userSearch = document.getElementById('userSearch');
            if (userSearch) {
                userSearch.addEventListener('input', function() {
                    filterUsers(this.value);
                });
            }
        }

        function filterUsers(searchTerm) {
            const rows = document.querySelectorAll('#usuarios-section tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const shouldShow = text.includes(searchTerm.toLowerCase());
                row.style.display = shouldShow ? '' : 'none';
            });
        }

        // Modal Functions
        function showUserProfile(userName) {
            const modal = new bootstrap.Modal(document.getElementById('userProfileModal'));
            document.getElementById('profileName').textContent = userName;
            modal.show();
        }

        function showProtocolDetails(protocolNumber) {
            const modal = new bootstrap.Modal(document.getElementById('protocolModal'));
            document.getElementById('protocolNumber').textContent = protocolNumber;
            modal.show();
        }

        function showImageModal(imageTitle) {
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            document.getElementById('imageModalTitle').textContent = imageTitle;
            modal.show();
        }

        // Notification Functions
        function markAsRead(notificationElement) {
            notificationElement.style.opacity = '0.6';
            notificationElement.style.background = 'transparent';
        }

        // Auto-refresh notifications
        function refreshNotifications() {
            // Simulate new notification
            const badge = document.querySelector('.notification-badge');
            if (badge) {
                const currentCount = parseInt(badge.textContent);
                badge.textContent = currentCount + 1;
                badge.style.animation = 'pulse 0.5s ease-in-out';
            }
        }

        // Protocol Management Functions
        function createNewProtocol() {
            alert('Funcionalidade de criação de protocolo em desenvolvimento');
        }

        function respondToProtocol(protocolId) {
            showProtocolDetails(protocolId);
        }

        // User Management Functions
        function createNewUser() {
            alert('Funcionalidade de criação de usuário em desenvolvimento');
        }

        function editUser(userId) {
            alert(`Editando usuário ${userId}`);
        }

        function toggleUserStatus(userId) {
            alert(`Alterando status do usuário ${userId}`);
        }

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });


        // Handle responsive behavior
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                // Desktop view - ensure sidebar is visible
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                sidebar.classList.remove('show');
                overlay.classList.add('d-none');
            }
        });

        // Simulate real-time activity updates
        function addActivityItem(user, action, protocol, status) {
            const tbody = document.querySelector('#dashboard-section tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <div class="user-avatar" style="width: 32px; height: 32px;">${user.charAt(0)}${user.split(' ')[1]?.charAt(0) || ''}</div>
                        <div>
                            <div class="fw-semibold">${user}</div>
                            <small class="text-muted">Técnico</small>
                        </div>
                    </div>
                </td>
                <td>${action}</td>
                <td><span class="badge bg-secondary">${protocol}</span></td>
                <td>agora</td>
                <td><span class="badge-status badge-${status}">${status.charAt(0).toUpperCase() + status.slice(1)}</span></td>
            `;
            
            // Add to top of table
            tbody.insertBefore(newRow, tbody.firstChild);
            
            // Remove last row if more than 5 items
            if (tbody.children.length > 5) {
                tbody.removeChild(tbody.lastChild);
            }
            
            // Highlight new row
            newRow.style.background = 'rgba(255, 193, 7, 0.1)';
            setTimeout(() => {
                newRow.style.background = '';
            }, 3000);
        }

        // Simulate activity every 2 minutes
        setInterval(function() {
            if (Math.random() > 0.7) { // 30% chance
                const users = ['Carlos Pereira', 'Ana Costa', 'Roberto Lima', 'Fernanda Silva'];
                const actions = ['Criou protocolo', 'Respondeu protocolo', 'Enviou fotos', 'Finalizou tarefa'];
                const protocols = ['#' + (1250 + Math.floor(Math.random() * 50))];
                const statuses = ['novo', 'pendente', 'concluido'];
                
                const randomUser = users[Math.floor(Math.random() * users.length)];
                const randomAction = actions[Math.floor(Math.random() * actions.length)];
                const randomProtocol = protocols[0];
                const randomStatus = statuses[Math.floor(Math.random() * statuses.length)];
                
                addActivityItem(randomUser, randomAction, randomProtocol, randomStatus);
            }
        }, 120000); // 2 minutes

        // Initialize charts (placeholder for future implementation)
        function initializeCharts() {
            // Chart.js integration would go here
            console.log('Charts initialized');
        }

        // Export functions for global access
        window.toggleSidebar = toggleSidebar;
        window.toggleTheme = toggleTheme;
        window.showUserProfile = showUserProfile;
        window.showProtocolDetails = showProtocolDetails;
        window.showImageModal = showImageModal;
    </script>
    <script>
        function abrirModal2() {
            var modal2 = new bootstrap.Modal(document.getElementById('exampleModalToggle2'));
            modal2.show();
        }
    
        function voltarParaModal1() {
            var modal2 = bootstrap.Modal.getInstance(document.getElementById('exampleModalToggle2'));
            modal2.hide();
        }
    </script>
    
     @livewireScripts
</body>
</html>