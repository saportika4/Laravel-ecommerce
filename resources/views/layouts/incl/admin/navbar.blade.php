
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <a href="" class="sidebar-toggle">
                    <img class="svg" src="{{asset('admin/img/svg/bars.svg')}}" alt="img"></a>
                <a class="navbar-brand" href="#"><img class="dark" src="{{asset('admin/img/logo_dark.png')}}" alt="svg"><img class="light" src="{{asset('admin/img/logo_white.png')}}" alt="img"></a>
            </div>
            <!-- ends: navbar-left -->

            <div class="navbar-right">
                <ul class="navbar-right__menu">

                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img src="img/author-nav.jpg" alt="" class="rounded-circle"></a>
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="img/author-nav.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>{{ Auth::user()->name }}</h6>
                                        {{-- <span>UI Designer</span> --}}
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="">
                                                <span data-feather="user"></span> Profile</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="settings"></span> Settings</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="key"></span> Billing</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="users"></span> Activity</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="bell"></span> Help</a>
                                        </li>
                                    </ul>

                                        <a class="nav-author__signout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <span data-feather="log-out"></span>{{ __('Sign Out') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </div>
                            </div>
                            <!-- ends: .dropdown-wrapper -->
                        </div>
                    </li>
                    <!-- ends: .nav-author -->
                </ul>
                <!-- ends: .navbar-right__menu -->
                <div class="navbar-right__mobileAction d-md-none">
                    <!-- <a href="#" class="btn-search">
                        <span data-feather="search"></span>
                        <span data-feather="x"></span></a> -->
                    <a href="#" class="btn-author-action">
                        <span data-feather="more-vertical"></span></a>
                </div>
            </div>
            <!-- ends: .navbar-right -->
        </nav>
    </header>
