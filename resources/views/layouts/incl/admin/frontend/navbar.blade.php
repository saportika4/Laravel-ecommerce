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
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                <div class="select-custom">
                                    <select id="cat" name="cat">
                                        <option value="">All Categories</option>
                                        <option value="4">Fashion</option>
                                        <option value="12">- Women</option>
                                        <option value="13">- Men</option>
                                        <option value="66">- Jewellery</option>
                                        <option value="67">- Kids Fashion</option>
                                        <option value="5">Electronics</option>
                                        <option value="21">- Smart TVs</option>
                                        <option value="22">- Cameras</option>
                                        <option value="63">- Games</option>
                                        <option value="7">Home &amp; Garden</option>
                                        <option value="11">Motors</option>
                                        <option value="31">- Cars and Trucks</option>
                                        <option value="32">- Motorcycles &amp; Powersports</option>
                                        <option value="33">- Parts &amp; Accessories</option>
                                        <option value="34">- Boats</option>
                                        <option value="57">- Auto Tools &amp; Supplies</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                                <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                            </div>
                            <!-- End .header-search-wrapper -->
                        </form>
                    </div>
                    <!-- End .header-search -->

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item" style="list-style-type: none; font-size:14px;">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item" style="list-style-type: none; font-size:14px;">
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
                                    <li><a style="padding-left: 10px;" href="wishlist.html">Profile</a></li>
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

                        <div class="cart-overlay"></div>

                        <div class="dropdown-menu mobile-cart">
                            <a href="#" title="Close (Esc)" class="btn-close">×</a>

                            <div class="dropdownmenu-wrapper custom-scrollbar">
                                <div class="dropdown-cart-header">Shopping Cart</div>
                                <!-- End .dropdown-cart-header -->

                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span> × $99.00
                                            </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset('assets/images/products/product-1.jpg')}}" alt="product" width="80" height="80">
                                            </a>

                                            <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->

                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Brown Women Casual HandBag</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span> × $35.00
                                            </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset('assets/images/products/product-2.jpg')}}" alt="product" width="80" height="80">
                                            </a>

                                            <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->

                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Circled Ultimate 3D Speaker</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span> × $35.00
                                            </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset('assets/images/products/product-3.jpg')}}" alt="product" width="80" height="80">
                                            </a>
                                            <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->
                                </div>
                                <!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>SUBTOTAL:</span>

                                    <span class="cart-total-price float-right">$134.00</span>
                                </div>
                                <!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                        Cart</a>
                                    <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                </div>
                                <!-- End .dropdown-cart-total -->
                            </div>
                            <!-- End .dropdownmenu-wrapper -->
                        </div>
                        <!-- End .dropdown-menu -->
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
