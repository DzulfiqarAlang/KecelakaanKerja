<header class="top-header">
  <nav class="navbar navbar-expand align-items-center justify-content-between px-3">

    <!-- LEFT SIDE -->
    <div class="d-flex align-items-center gap-3">

      <!-- Toggle Button -->
      <div class="btn-toggle">
        <a href="javascript:void(0);">
          <i class="material-icons-outlined">menu</i>
        </a>
      </div>

      <!-- Search Form -->
      <form action="{{ route('admin.search') }}" method="GET" class="position-relative">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control rounded-5 ps-5 pe-4"
          placeholder="Search..." style="width: 300px;">

        <span class="material-icons-outlined position-absolute top-50 start-0 translate-middle-y ms-3">
          search
        </span>
      </form>

    </div>

    <!-- RIGHT SIDE -->
    <ul class="navbar-nav">
      <li class="nav-item dropdown">

        <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">

          <img src="{{ auth()->user()->photo
  ? asset('storage/' . auth()->user()->photo)
  : asset('admin/images/avatars/01.png') }}" class="rounded-circle border p-1" width="45" height="45">
        </a>

        <div class="dropdown-menu dropdown-menu-end shadow">

          <div class="text-center p-3">
            <img src="{{ auth()->user()->photo
  ? asset('storage/' . auth()->user()->photo)
  : asset('admin/images/avatars/01.png') }}" class="rounded-circle mb-2" width="70" height="70">

            <h6 class="mb-0 fw-bold">
              Hello, {{ auth()->user()->name }}
            </h6>
          </div>

          <hr class="dropdown-divider">

          <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.profile.edit') }}">
            <i class="material-icons-outlined">person_outline</i>
            Edit Profile
          </a>

          <hr class="dropdown-divider">

          <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.logout') }}">
            <i class="material-icons-outlined">power_settings_new</i>
            Logout
          </a>

        </div>
      </li>
    </ul>

  </nav>
</header>