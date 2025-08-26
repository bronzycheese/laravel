<nav class="top-navbar">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary d-lg-none me-3" type="button" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item active" id="breadcrumb-current">Dashboard</li>
                    </ol>
                </nav>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <button class="btn-theme-toggle" onclick="toggleTheme()">
                    <i class="bi bi-moon" id="theme-icon"></i>
                </button>
                
                <div class="dropdown user-dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                        <div class="user-avatar">{{ substr(optional(Auth::user())->nome, 0, 2) }}</div>
                        <div class="d-none d-sm-block text-start">
                            <div class="fw-semibold" style="font-size: 0.875rem;">{{ substr(optional(Auth::user())->nome, 0, 50) }}</div>
                            <small class="text-muted">{{ substr(optional(Auth::user())->email, 0, 50) }}</small>
                        </div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPasswordReset"><i class="bi bi-person me-2"></i>Perfil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i>Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- <livewire:admin.app.sistema.perfil.perfil-component  /> --}}