<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">LaraCommerce</span><br>
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">Products Area</li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.product-category.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.product-category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-stream"></i>
                        <p> Categories <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product-category.index') }}" class="nav-link {{ request()->routeIs('admin.product-category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i><p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product-category.create') }}" class="nav-link {{ request()->routeIs('admin.product-category.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i><p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.brand.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.brand.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-arrows-alt"></i>
                        <p> Brands <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.index') }}" class="nav-link {{ request()->routeIs('admin.brand.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.create') }}" class="nav-link {{ request()->routeIs('admin.brand.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.product.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p> Products <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}" class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.create') }}" class="nav-link {{ request()->routeIs('admin.product.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Manage Orders</li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i><p> Orders</p>
                    </a>
                </li>

            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
</aside>