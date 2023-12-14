<div class="page-wrapper">

    <header class="header">


        <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
            <div class="container">
                <div class="header-left col-lg-2 w-auto pl-0">
                    <button class="mobile-menu-toggler text-primary mr-2" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="demo4.html" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}" width="111" height="44" alt="Porto Logo">
                    </a>
                </div>
                <!-- End .header-left -->

                <div class="header-right w-lg-max">
                    <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                        <form action="{{ url('search') }}" method="GET">
                            <div class="header-search-wrapper">
                                <input type="search" name="search" value="{{ Request::get('search') }}" class="form-control" id="q" placeholder="Search..." required>
                                <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                            </div>
                            <!-- End .header-search-wrapper -->
                        </form>
                    </div>
                    <!-- End .header-search -->

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item me-3" style="list-style-type: none; font-size:14px;">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item me-3" style="list-style-type: none; font-size:14px;">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <div class="header-dropdown">
                            <a href="#" class="header-icon d-flex align-items-baseline justify-content-center">
                                <i class="icon-user-2"></i>
                                <span style="font-size: 16px;padding-left:5px;">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="megamenu" style="min-width: 150px;
                            font-size: 14px;">
                                <ul>
                                    <li><a style="padding-left: 10px;" href="{{ url('profile') }}">Profile</a></li>
                                    <li><a style="padding-left: 10px;" href="{{ url('orders') }}">My Orders</a></li>
                                    <li><a style="padding-left: 10px;" href="{{ url('wishList') }}">Wishlist</a></li>
                                    <li><a style="padding-left: 10px;" href="{{ url('cart') }}">Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" style="padding-right: 10px;"></i>{{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                    @endguest

                    <a href="{{ url('wishList') }}" class="header-icon cart" title="wishlist">
                        <i class="icon-wishlist-2"></i>
                        <span class="cart-count badge-circle count"><livewire:frontend.wishlist-count /></span>
                    </a>

                    <div class="dropdown cart-dropdown">
                        <a href="{{ url('cart') }}" title="Cart" class="dropdown-toggle" role="button">
                            <i class="minicart-icon"></i>
                            <span class="cart-count badge-circle" style="background: #cb1919;"><livewire:frontend.cart.cart-count /></span>
                        </a>
                    </div>
                    <!-- End .dropdown -->
                </div>
                <!-- End .header-right -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .header-middle -->

        <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
            <div class="container">
                <nav class="main-nav w-100">
                    <ul class="menu">
                        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="{{ (request()->is('collections')) ? 'active' : '' }}">
                            <a href="{{ url('/collections') }}">All Categories</a>
                        </li>
                        <li class="{{ (request()->is('/new-arrivals')) ? 'active' : '' }}">
                            <a href="{{ url('/new-arrivals') }}">New Arrivals</a>
                        </li>
                        <li class="{{ (request()->is('/featured')) ? 'active' : '' }}">
                            <a href="{{ url('/featured') }}">Featured Products</a>
                        </li>
                        <li class="{{ (request()->is('/electronics')) ? 'active' : '' }}">
                            <a href="{{ url('/electronics') }}">Electronics</a>
                        </li>
                        <li class="{{ (request()->is('/fashions')) ? 'active' : '' }}">
                            <a href="{{ url('/fashions') }}">Fashions</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .header-bottom -->
    </header>
