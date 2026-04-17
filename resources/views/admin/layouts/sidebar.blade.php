<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">

    <div class="logo-name flex-grow-1">
      <h5 class="mb-0">Sistem Pencatatan Kecelakaan Kerja</h5>
    </div>
    <div class="sidebar-close">
      <span class="material-icons-outlined">close</span>
    </div>
  </div>
  <div class="sidebar-nav">
    <ul class="metismenu" id="sidenav">

      <li class="menu-label">Menu Utama</li>

      <li>
        <a href="{{ route('admin.dashboard') }}">
          <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.kecelakaanKerja') }}">
          <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i></div>
          <div class="menu-title">Manajemen Data</div>
        </a>
      </li>

      <li>
        <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="parent-icon">
            <i class="material-icons-outlined">power_settings_new</i>
          </div>
          <div class="menu-title ">Logout</div>
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
          @csrf
        </form>
      </li>


      <!-- <li>
  <a href="{{ route('admin.orders') }}">  <div class="parent-icon"><i class="material-icons-outlined">shopping_cart</i></div>
    <div class="menu-title">Data Pesanan</div>
  </a>
</li> -->


    </ul>
  </div>
</aside>