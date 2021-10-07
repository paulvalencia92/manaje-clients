<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item" data-item="dashboard"><a class="nav-item-hold" href="#"><i
                            class="nav-icon i-Bar-Chart"></i><span class="nav-text">Menu principal</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        <ul class="childNav" data-parent="dashboard">
            <li class="nav-item">
                <a href="{{ route('cities.index') }}"><i class="nav-icon i-Clock-3"></i>
                    <span class="item-name">Ciudades</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('clients.index') }}"><i class="nav-icon i-Over-Time"></i>
                    <span class="item-name">Clientes</span>
                </a>
            </li>
            <li class="nav-item"><a href="{{ route('users.index') }}">
                    <i class="nav-icon i-Clock-4"></i><span class="item-name">Usuarios</span></a>
            </li>
            <li class="nav-item"><a href="{{ route('exports.index') }}">
                    <i class="nav-icon i-Clock-4"></i><span class="item-name">Descargar exportaciones</span></a>
            </li>
            <li class="nav-item"><a href="{{ route('imports.index') }}">
                    <i class="nav-icon i-Clock-4"></i><span class="item-name">Importar clientes</span></a>
            </li>

        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
