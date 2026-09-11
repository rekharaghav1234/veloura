<nav class="navbar navbar-expand-lg custom-navbar sticky-top">

    @php
    use App\Models\Cart;
    use App\Models\Order;

    $cartCount = Auth::check()
        ? Cart::where('user_id', Auth::id())->sum('quantity')
        : 0;

    $hasOrders = Auth::check()
        ? Order::where('user_id', Auth::id())->exists()
        : false;
@endphp

    <div class="container">

        <!-- ================= MOBILE NAVBAR ================= -->
        <div class="d-flex d-lg-none w-100 align-items-center justify-content-between py-2">

            <!-- LOGO -->
            <a class="navbar-brand m-0" href="/">
                {{-- <img src="{{ asset('images/logo.png') }}"
                     alt="VELOURA"
                     class="logo-img"> --}}
                     VELOURA
            </a>

            <!-- MOBILE RIGHT SIDE -->
            {{-- <div class="d-flex align-items-center gap-3">

                @auth

                    <!-- USER DROPDOWN -->
                    <div class="dropdown">

                        <a class="mobile-icon text-decoration-none"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
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

                            @if(Auth::user()->role == 'admin')

                                <li>

                                    <a class="dropdown-item"
                                       href="/admin/dashboard">

                                        <i class="bi bi-speedometer2 me-2"></i>
                                        Admin Panel

                                    </a>

                                </li>

                            @endif

                            <li>

                                <a class="dropdown-item"
                                   href="/profile">

                                    <i class="bi bi-person me-2"></i>
                                    My Profile

                                </a>

                            </li>

                            {{ $cartCount }}
                        
                        @if($hasOrders)
                        
                            <li>
                        
                                <a class="dropdown-item"
                                   href="/my-orders">
                        
                                    <i class="bi bi-bag-check me-2"></i>
                                    My Orders
                        
                                </a>
                        
                            </li>
                        
                        @endif

                            <li><hr class="dropdown-divider"></li>

                            <li>

                                <form action="{{ route('logout') }}"
                                      method="POST">

                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item text-danger">

                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </div>

                    <!-- CART -->
                    <a href="/cart"
                       class="position-relative mobile-icon">

                        <i class="bi bi-bag"></i>

                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                            {{ Cart::where('user_id', Auth::id())->sum('quantity') ?? 0 }}

                        </span>

                    </a>

                @else

                    <!-- GUEST USER -->
                    <div class="dropdown">

                        <a class="mobile-icon text-decoration-none"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle"></i>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mobile-user-dropdown">

                            <li>

                                <a class="dropdown-item"
                                   href="/login">

                                    Login

                                </a>

                            </li>

                            <li>

                                <a class="dropdown-item"
                                   href="/register">

                                    Register

                                </a>

                            </li>

                        </ul>

                    </div>

                @endauth

            </div> --}}
            
<!-- MOBILE RIGHT SIDE -->
<div class="d-flex align-items-center gap-3">

    @auth

        {{-- ADMIN MENU --}}
        @if(Auth::user()->role == 'admin')

            <button type="button"
                    id="mobileMenuBtn"
                    class="mobile-admin-menu"
                    aria-label="Open Admin Menu">

                <i class="bi bi-three-dots-vertical"></i>

            </button>

        @endif


        <!-- USER DROPDOWN -->
        <div class="dropdown">

            <a class="mobile-icon text-decoration-none"
               href="#"
               role="button"
               data-bs-toggle="dropdown"
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

                @if(Auth::user()->role == 'admin')

                    <li>
                        <a class="dropdown-item"
                           href="/admin/dashboard">

                            <i class="bi bi-speedometer2 me-2"></i>
                            Admin Panel

                        </a>
                    </li>

                @endif

                <li>
                    <a class="dropdown-item"
                       href="/profile">

                        <i class="bi bi-person me-2"></i>
                        My Profile

                    </a>
                </li>

                @if($hasOrders)

                    <li>
                        <a class="dropdown-item"
                           href="/my-orders">

                            <i class="bi bi-bag-check me-2"></i>
                            My Orders

                        </a>
                    </li>

                @endif

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>

                    <form action="{{ route('logout') }}"
                          method="POST">

                        @csrf

                        <button type="submit"
                                class="dropdown-item text-danger">

                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>


        <!-- CART -->
        <a href="/cart"
           class="position-relative mobile-icon">

            <i class="bi bi-bag"></i>

            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                {{ Cart::where('user_id', Auth::id())->sum('quantity') ?? 0 }}

            </span>

        </a>

    @else

        <!-- GUEST USER -->
        <div class="dropdown">

            <a class="mobile-icon text-decoration-none"
               href="#"
               role="button"
               data-bs-toggle="dropdown">

                <i class="bi bi-person-circle"></i>

            </a>

            <ul class="dropdown-menu dropdown-menu-end mobile-user-dropdown">

                <li>
                    <a class="dropdown-item"
                       href="/login">
                        Login
                    </a>
                </li>

                <li>
                    <a class="dropdown-item"
                       href="/register">
                        Register
                    </a>
                </li>

            </ul>

        </div>

    @endauth

</div>



        </div>

        <!-- ================= MOBILE SEARCH ================= -->
        <form class=" w-100 mb-2"
              method="GET"
              action="/search">

            <div class="input-group">

                <input type="text"
                       class="form-control search-input"
                       placeholder="Search products..."
                       name="q">

                <button class="btn btn-pink"
                        type="submit">

                    <i class="bi bi-search"></i>

                </button>

            </div>

        </form>
        {{-- <form class="d-none d-lg-flex mx-4"
        method="GET"
        action="/search">
  
      <input type="text"
             class="form-control"
             name="q"
             placeholder="Search products...">
  
      <button class="btn btn-pink ms-2"
              type="submit">
          <i class="bi bi-search"></i>
      </button>
  
  </form> --}}

        <!-- ================= DESKTOP NAVBAR ================= -->
        <div class="d-none d-lg-flex w-100 align-items-center">

            <!-- LOGO -->
            {{-- <a class="navbar-brand d-flex align-items-center"
               href="/">
VELOURA
                <img src="{{ asset('images/logo.png') }}"
                     alt="VELOURA"
                     class="logo-img">

            </a> --}}

            <!-- MENU -->
            <ul class="navbar-nav mx-auto gap-4">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>

                

            </ul>
            @if($hasOrders)

            <a href="/my-orders"
               class="nav-action-btn">
    
                My Orders
    
            </a>
    
        @endif
            <!-- RIGHT SIDE -->
            <div class="d-flex align-items-center gap-3">

                @guest

                    <a href="/login"
                       class="nav-action-btn login-btn">

                        Login

                    </a>

                    <a href="/register"
                       class="nav-action-btn register-btn">

                        Register

                    </a>

                @else

                    <!-- CART -->
                    <a href="/cart"
                       class="position-relative">

                        <i class="bi bi-bag fs-5 text-dark"></i>

                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                            {{ Cart::where('user_id', Auth::id())->sum('quantity') ?? 0 }}

                        </span>

                    </a>

                    <!-- USER -->
                    <div class="user-box">

                        <span class="user-circle">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

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

                    <form action="{{ route('logout') }}"
                          method="POST">

                        @csrf

                        <button type="submit"
                                class="nav-action-btn logout-btn">

                            Logout

                        </button>

                    </form>

                @endguest

            </div>
            <ul class="navbar-nav ms-auto">

                @auth
            
                    @if(auth()->user()->role == 'admin')
            
                        <li class="nav-item">
                            <button id="menuBtn"
                                    class="btn btn-dark">
                                ☰ Admin Menu
                            </button>
                        </li>
            
                    @endif
            
                @endauth
            
            </ul>

        </div>

    </div>

</nav>