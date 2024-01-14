<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Principal</span>
    </a>

    @can('ver-user')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    
    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan

    @withoutRole
        <a class="nav-link" href="/solicitud_creditos">
            <i class="fas fa-paper-plane"></i><span>Mis Solicitudes</span>
        </a>
    @endwithoutRole

    @withoutRole
        <a class="nav-link" href="/creditos">
            <i class="fas fa-hand-holding-usd"></i></i><span>Mis Creditos</span>
        </a>
    @endwithoutRole

    @can('ver-solicitudes')
    <a class="nav-link" href="/solicitudes">
        <i class="fas fa-paper-plane"></i><span>Solicitudes</span>
    </a>
    @endcan

    @can('aprobar-solicitud')
    <a class="nav-link" href="/solicitudes_to_approved">
        <i class="fas fa-check-circle"></i><span>Aprobar Solicitudes</span>
    </a>
    @endcan
    
</li>
