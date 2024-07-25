<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SRA</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item{{ Request::routeIs('backend.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('backend.dashboard') }}"
                        class="nav-link {{ Request::routeIs('backend.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Produk -->
                <li class="nav-item {{ Request::routeIs('backend.products.*') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}"
                        class="nav-link {{ Request::routeIs('backend.products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>

                <!-- Testimoni -->
                <li class="nav-item {{ Request::routeIs('backend.testimonials.index') ? 'active' : '' }}">
                    {{-- <a href="{{ route('testimonials.index') }}" --}}
                    class="nav-link {{ Request::routeIs('backend.testimonials.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Testimoni
                    </p>
                    </a>
                </li>

                <!-- Charts -->
                <li class="nav-item {{ Request::routeIs('about.index') ? 'active' : '' }}">
                    {{-- <a href="{{ route('about.index') }}" --}}
                    class="nav-link {{ Request::routeIs('about.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        About
                    </p>
                    </a>
                </li>
                <!-- Forms -->
                <li class="nav-item {{ Request::routeIs('forms') ? 'active' : '' }}">
                    <a href="#" class="nav-link {{ Request::routeIs('forms') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Tables -->
                <li class="nav-item {{ Request::routeIs('tables') ? 'active' : '' }}">
                    <a href="#" class="nav-link {{ Request::routeIs('tables') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Documentation -->
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
