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
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">Products Area</li>

                <li
                    class="nav-item has-treeview {{ request()->routeIs('admin.product-category.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.product-category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-stream"></i>
                        <p> Categories <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product-category.index') }}"
                                class="nav-link {{ request()->routeIs('admin.product-category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product-category.create') }}"
                                class="nav-link {{ request()->routeIs('admin.product-category.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
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
                            <a href="{{ route('admin.brand.index') }}"
                                class="nav-link {{ request()->routeIs('admin.brand.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.create') }}"
                                class="nav-link {{ request()->routeIs('admin.brand.create') ? 'active' : '' }}">
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
                            <a href="{{ route('admin.product.index') }}"
                                class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.create') }}"
                                class="nav-link {{ request()->routeIs('admin.product.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Manage Orders</li>
                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}"
                        class="nav-link {{ request()->routeIs('admin.order.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p> Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}"
                        class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p> Statistics</p>
                    </a>
                </li>

                <li class="nav-header">Manage Store</li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.coupon.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.coupon.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-percent"></i>
                        <p> Coupon <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.coupon.index') }}"
                                class="nav-link {{ request()->routeIs('admin.coupon.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Coupons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.coupon.create') }}"
                                class="nav-link {{ request()->routeIs('admin.coupon.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->routeIs('admin.shipping.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.shipping.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p> Shipping <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.shipping.index') }}"
                                class="nav-link {{ request()->routeIs('admin.shipping.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Shippings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.shipping.create') }}"
                                class="nav-link {{ request()->routeIs('admin.shipping.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.tax.*') ? 'menu-open active' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.tax.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p> Tax <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.tax.index') }}"
                                class="nav-link {{ request()->routeIs('admin.tax.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Taxes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.tax.create') }}"
                                class="nav-link {{ request()->routeIs('admin.tax.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>