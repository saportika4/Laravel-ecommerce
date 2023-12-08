    <footer class="footer bg-dark">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">Contact Info</h4>
                            <ul class="contact-info">
                                <li>
                                    <span class="contact-info-label">Address:</span>123 Street Name, City, England
                                </li>
                                <li>
                                    <span class="contact-info-label">Phone:</span><a href="tel:">(123)
                                        456-7890</a>
                                </li>
                                <li>
                                    <span class="contact-info-label">Email:</span> <a href=""><span class="__cf_email__" data-cfemail="0e636f67624e6b766f637e626b206d6163">[email&#160;protected]</span></a>
                                </li>
                                <li>
                                    <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                                </li>
                            </ul>
                            <div class="social-icons">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                            </div>
                            <!-- End .social-icons -->
                        </div>
                        <!-- End .widget -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4>

                            <ul class="links">
                                <li><a href="#">Help & FAQs</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Shipping & Delivery</a></li>
                                <li><a href="#">Orders History</a></li>
                                <li><a href="#">Advanced Search</a></li>
                                <li><a href="dashboard.html">My Account</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Corporate Sales</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                        <!-- End .widget -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>

                            <div class="tagcloud">
                                <a href="#">Bag</a>
                                <a href="#">Black</a>
                                <a href="#">Blue</a>
                                <a href="#">Clothes</a>
                                <a href="#">Fashion</a>
                                <a href="#">Hub</a>
                                <a href="#">Shirt</a>
                                <a href="#">Shoes</a>
                                <a href="#">Skirt</a>
                                <a href="#">Sports</a>
                                <a href="#">Sweater</a>
                            </div>
                        </div>
                        <!-- End .widget -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget widget-newsletter">
                            <h4 class="widget-title">Subscribe newsletter</h4>
                            <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                            </p>
                            <form action="#" class="mb-0">
                                <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                                <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                            </form>
                        </div>
                        <!-- End .widget -->
                    </div>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .footer-middle -->

        <div class="container">
            <div class="footer-bottom">
                <div class="container d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        {{-- <div class="payment-icons">
                            <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                            <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                            <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                            <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- End .footer-bottom -->
        </div>
        <!-- End .container -->
    </footer>

</div>

{{-- <div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div> --}}

<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
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
        <!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="#">
            <input type="text" class="form-control mb-0" placeholder="Search..." required />
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        <div class="social-icons">
            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="{{ url('/') }}">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{ url('/collections') }}" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="wishlist.html" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="login.html" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="cart.html" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">3</span>
            </i>Cart
        </a>
    </div>
</div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
