<nav class="navbar navbar-expand-lg custom-navbar sticky-top">

    @php
        use App\Models\Cart;
        use App\Models\Order;

        $cartCount = Auth::check() ? Cart::where('user_id', Auth::id())->sum('quantity') : 0;

        $hasOrders = Auth::check() ? Order::where('user_id', Auth::id())->exists() : false;
    @endphp

    <div class="container">

        {{-- ================= MOBILE NAVBAR ================= --}}
        <div class="d-flex d-lg-none w-100 align-items-center justify-content-between py-2">

            {{-- LOGO --}}
            <a class="navbar-brand m-0" href="/">
                VELOURA
            </a>

            {{-- MOBILE RIGHT --}}
            <div class="d-flex align-items-center gap-3">

                @auth

                    {{-- ADMIN MENU --}}
                 

                    {{-- USER --}}
                    <div class="dropdown">

                        <a class="mobile-icon text-decoration-none" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i class="bi bi-person-circle"></i>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mobile-user-dropdown">

                            <li class="px-3 py-2 border-bottom">

                                <div class="fw-bold text-dark">
                                    {{ Auth::user()->name }}
                                </div>

                                <small class="text-muted">
                                    Welcome Back
                                </small>

                            </li>

                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item" href="/admin/dashboard">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        Admin Panel
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a class="dropdown-item" href="/profile">
                                    <i class="bi bi-person me-2"></i>
                                    My Profile
                                </a>
                            </li>

                          

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="dropdown-item text-danger">

                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout

                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
  

                    @if (Auth::user()->role == 'admin')
                    <button type="button" id="mobileMenuBtn" class="mobile-admin-menu" aria-label="Open Admin Menu">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                @endif
                    {{-- CART --}}
                    {{-- <a href="/cart" class="position-relative mobile-icon">

                        <i class="bi bi-bag"></i>

                        @if ($cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif

                    </a> --}}

                    {{-- MORE --}}
                    {{-- <div class="dropdown">

                        <button type="button" class="mobile-icon border-0 bg-transparent" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-label="More Menu">

                            <i class="bi bi-three-dots-vertical"></i>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end mobile-user-dropdown">

                            <li>
                                <a class="dropdown-item" href="/">
                                    <i class="bi bi-house me-2"></i>
                                    Home
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('wishlist.index') }}">

                                    <i class="bi bi-heart me-2"></i>
                                    Wishlist

                                </a>
                            </li>

                        </ul>

                    </div> --}}
                @else
                    {{-- GUEST USER --}}
                    <div class="dropdown">

                        <a class="mobile-icon text-decoration-none" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i class="bi bi-person-circle"></i>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mobile-user-dropdown">

                            <li>
                                <a class="dropdown-item" href="/login">
                                    Login
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/register">
                                    Register
                                </a>
                            </li>

                        </ul>

                    </div>

                @endauth

            </div>

        </div>


        {{-- ================= MOBILE SEARCH ================= --}}
        <form class="d-lg-none w-100 mb-2" method="GET" action="/search">

            <div class="input-group">

                <input type="text" class="form-control search-input" placeholder="Search products..." name="q">

               

            </div>

        </form>


        {{-- ================= DESKTOP NAVBAR ================= --}}
        <div class="d-none d-lg-flex w-100 align-items-center desktop-navbar">

            {{-- LOGO --}}
            <a href="/" class="desktop-logo">
                VELOURA
            </a>
        
            {{-- SEARCH --}}
            <form class="desktop-search" method="GET" action="/search">
                <div class="desktop-search-box">
                    <input type="text"
                           name="q"
                           class="desktop-search-input"
                           placeholder="Search products...">
        
                    <button type="submit" class="desktop-search-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        
            {{-- MENU --}}
            <ul class="navbar-nav desktop-menu">

                @if(!Auth::check() || Auth::user()->role != 'admin')
            
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            Home
                        </a>
                    </li>
            
                    @if($hasOrders)
                        <li class="nav-item">
                            <a class="nav-link" href="/my-orders">
                                My Orders
                            </a>
                        </li>
                    @endif
            
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wishlist.index') }}">
                            <i class="bi bi-heart me-1"></i>
                            Wishlist
                        </a>
                    </li>
            
                @endif
            
            </ul>
        
            {{-- RIGHT SIDE --}}
            <div class="desktop-right">
        
                @guest
        
                    <a href="/login" class="nav-action-btn login-btn">
                        Login
                    </a>
        
                    <a href="/register" class="nav-action-btn register-btn">
                        Register
                    </a>
        
                @else
        
                    <a href="/cart" class="desktop-cart position-relative">
                        <i class="bi bi-bag"></i>
        
                        @if($cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
        
                    <div class="user-box">
                        <span class="user-circle">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
        
                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>
                    </div>
        
                    @if(Auth::user()->role == 'admin')
                        <a href="/admin/dashboard"
                           class="nav-action-btn admin-btn">
                            Admin
                        </a>
                    @endif
        
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
        
                        <button type="submit"
                                class="nav-action-btn logout-btn">
                            Logout
                        </button>
                    </form>
        
                @endguest
        
            </div>
        
        
            {{-- ================= ADMIN SIDEBAR BUTTON ================= --}}
            @auth
                @if(Auth::user()->role == 'admin')
                    <button type="button"
                            id="menuBtn"
                            class="btn btn-dark admin-sidebar-btn"
                            aria-label="Open Admin Menu">
                        <i class="bi bi-list"></i>
                    </button>
                @endif
            @endauth
        
        </div>

    </div>

</nav>
