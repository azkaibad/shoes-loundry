<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-light sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-light">SOLE</h2> <h2 class="m-0 text-dark">SPLASH</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link {{ ($title === "Home" ) ? 'active' : '' }} ">Home</a>
                <a href="/about" class="nav-item nav-link {{ ($title === "About" ) ? 'active' : '' }} ">About</a>
                <a href="/service" class="nav-item nav-link {{ ($title === "Service" ) ? 'active' : '' }} ">Service</a>

                @auth
                <a href="/order" class="nav-item nav-link {{ ($title === "Order" ) ? 'active' : '' }} ">Order</a>
                <a href="/process/tunggu_bayar" class="nav-item nav-link {{ ($title === "Process" ) ? 'active' : '' }} ">Process</a>
                @endauth
                <a href="/testimoni" class="nav-item nav-link {{ ($title === "Testimoni" ) ? 'active' : '' }} ">Testimoni</a>
                @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome,{{ auth()->user()->name }}</a>
                    <div class="dropdown-menu bg-light">
                        <a href="/profile" class="dropdown-item {{ ($title === "Profile" ) ? 'active' : '' }}"><i class="bi bi-person-fill m-1"></i>Profile</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right m-1"></i>Logout</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="/login" class="nav-item nav-link {{ ($title === "Login" ) ? 'active' : '' }}"><i class="bi bi-box-arrow-in-left m-1"></i>Login</a>
                @endauth
                
                <!--a href="login" class="nav-item nav-link"><i class="fa fa-user" ></i>Profile</a-->
                
                
            </div>
            <!--a href="/login" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a-->
        </div>
        
    </nav>
    <!-- Navbar End -->