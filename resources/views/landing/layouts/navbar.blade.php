<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="text-light m-0">Telkom Witel Kudus</h1></a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-4 p-lg-0">
            <a href="{{ route('home') }}"
                class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}"
                class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('kecelakaanKerja') }}"
                class="nav-item nav-link {{ request()->routeIs('kecelakaanKerja') ? 'active' : '' }}">Reports</a>

            <a href="{{ route('contact') }}"
                class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <a href="{{ route('admin.login') }}"
   class="btn btn-telkom rounded-pill py-1 px-3 me-3 d-flex align-items-center">
    <i class="fa fa-lock me-2" style="font-size: 12px;"></i>
    <span style="font-size: 14px; font-weight: 600;">Login admin</span>
</a>
            
        </div>
    </div>
</nav>