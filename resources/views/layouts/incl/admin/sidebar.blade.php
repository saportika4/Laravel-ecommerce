        <aside class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">
                        <li class="menu-title">
                            <span>Main menu</span>
                        </li>
                        <li class="has-child {{ (request()->is('admin/dashboard')) ? 'open' : '' }}">
                            <a href="#" class="text-decoration-none {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                                <span data-feather="home" class="nav-icon"></span>
                                <span class="menu-text">Dashboard</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ url('admin/dashboard') }}" class="text-decoration-none {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">Dashboard</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('admin/orders') }}" class="text-decoration-none {{ (request()->is('admin/orders')) ? 'active' : '' }}">
                                <span data-feather="layout" class="nav-icon"></span>
                                <span class="menu-text">Orders</span>
                            </a>

                        </li>

                        <li class="has-child {{ (request()->is('admin/category')) ? 'open' : '' }}">
                            <a href="#" class="text-decoration-none {{ (request()->is('admin/category')) ? 'active' : '' }}">
                                <span data-feather="layout" class="nav-icon"></span>
                                <span class="menu-text">Category</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/category') }}" class="text-decoration-none {{ (request()->is('admin/category')) ? 'active' : '' }}">View Category</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-child {{ (request()->is('admin/brands')) ? 'open' : '' }}">
                            <a href="#" class="text-decoration-none {{ (request()->is('admin/brands')) ? 'active' : '' }}">
                                <span data-feather="layout" class="nav-icon"></span>
                                <span class="menu-text">Brands</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/brands') }}" class="text-decoration-none {{ (request()->is('admin/brands')) ? 'active' : '' }}">View Brands</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('admin/colors') }}" class="text-decoration-none {{ (request()->is('admin/colors')) ? 'active' : '' }}">
                                <span data-feather="layout" class="nav-icon"></span>
                                <span class="menu-text">Colors</span>
                            </a>

                        </li>

                        <li class="has-child {{ (request()->is('admin/products*')) ? 'open' : '' }}">
                            <a href="#" class="text-decoration-none {{ (request()->is('admin/products*')) ? 'active' : '' }}">
                                <span data-feather="shopping-cart" class="nav-icon"></span>
                                <span class="menu-text">Products</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/products/create') }}" class="text-decoration-none {{ (request()->is('admin/products/create')) ? 'active' : '' }}">Add Products</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/products') }}" class="text-decoration-none {{ (request()->is('admin/products')) ? 'active' : '' }}">View Products</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('admin/sliders') }}" class="text-decoration-none {{ (request()->is('admin/sliders')) ? 'active' : '' }}">
                                <span data-feather="layout" class="nav-icon"></span>
                                <span class="menu-text">Sliders</span>
                            </a>

                        </li>

                    </ul>
                </div>
            </div>
        </aside>
