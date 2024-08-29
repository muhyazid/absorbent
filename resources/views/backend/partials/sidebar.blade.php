<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/CERRO NEW COLOR - Copy.png') }}" alt="SRA Logo"
            class="brand-image brand-text font-weight-light" style="opacity: .8 ">
        <span class="brand-text font-weight-light">ABSORBENT</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info" style="text-align: center; width: 100%;">
                <a class="d-block" style="font-size: 1.2rem;">Halo, {{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('backend.dashboard') }}"
                        class="nav-link {{ Request::routeIs('backend.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Produk -->
                <li class="nav-item">
                    <a href="{{ route('products.index') }}"
                        class="nav-link {{ Request::routeIs('products.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>
                <!-- Kategori Produk -->
                <li class="nav-item">
                    <a href="{{ route('backend.about.index') }}"
                        class="nav-link {{ Request::routeIs('backend.about.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Kategori Produk</p>
                    </a>
                </li>
                <!-- Data User -->
                <li class="nav-item">
                    <a href="{{ route('backend.users.index') }}"
                        class="nav-link {{ Request::routeIs('backend.users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
