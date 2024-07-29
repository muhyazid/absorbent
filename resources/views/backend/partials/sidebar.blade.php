<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/sra-logo.png') }}" alt="SRA Logo" class="brand-image brand-text font-weight-light"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SRA</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin SRA</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item {{ Request::routeIs('backend.dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ route('backend.dashboard') }}"
                        class="nav-link {{ Request::routeIs('backend.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Produk -->
                <li class="nav-item {{ Request::routeIs('products.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('products.index') }}"
                        class="nav-link {{ Request::routeIs('products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>
                <!-- Testimoni -->
                {{-- <li class="nav-item {{ Request::routeIs('backend.testimonials.index') ? 'menu-open' : '' }}">
                        <a href="{{ route('backend.testimonials.index') }}"
                            class="nav-link {{ Request::routeIs('backend.testimonials.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Testimoni</p>
                        </a>
                    </li> --}}
                <!-- About -->
                {{-- <li class="nav-item {{ Request::routeIs('backend.about.index') ? 'menu-open' : '' }}">
                        <a href="{{ route('backend.about.index') }}"
                            class="nav-link {{ Request::routeIs('backend.about.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>About</p>
                        </a>
                    </li> --}}
                <!-- Data User -->
                <li class="nav-item {{ Request::routeIs('backend.users.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('backend.users.index') }}"
                        class="nav-link {{ Request::routeIs('backend.users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Data User</p>
                    </a>
                </li>
                {{-- Logout --}}
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
