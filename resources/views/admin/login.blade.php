<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Telkom Witel | Login Admin</title>
  
  <!-- <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png"> -->
  <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet">
  <script src="{{ asset('admin/js/pace.min.js') }}"></script>

  <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/metisMenu.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/mm-vertical.css') }}">
  
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  
  <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/sass/main.css') }}" rel="stylesheet">


  <style>
body{
    min-height:100vh;
    background: linear-gradient(rgba(255,255,255,0.85), rgba(255,255,255,0.85)),
    url('{{ asset("admin/images/telkom.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    font-family: 'Noto Sans', sans-serif;
}

/* Gradient khas Telkom */
.telkom-gradient{
    background: linear-gradient(135deg,#e60023,#ff4b2b);
    color:white;
}

/* Card login */
.login-card{
    backdrop-filter: blur(8px);
    background: rgba(255,255,255,0.95);
    border-radius:18px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    border:none;
}

/* Tombol Telkom */
.btn-telkom{
    background: linear-gradient(135deg,#e60023,#ff4b2b);
    border:none;
    color:white;
    font-weight:600;
    padding:12px;
    transition:.3s;
}

.btn-telkom:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 18px rgba(230,0,35,.35);
    color:white;
}

/* Logo */
.telkom-logo{
    width:90px;
    margin-bottom:15px;
}
</style>

</head>

<body>

<div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
    <div class="col-lg-4 col-md-6">

        <div class="card login-card p-4">

            <div class="text-center mb-4">
                <img src="{{ asset('landing/img/telkom-akses-seeklogo.png') }}" class="telkom-logo">

                <h3 class="fw-bold mb-1">Telkom Indonesia</h3>
                <small class="text-muted">Witel Kudus</small>
            </div>

            <h4 class="text-center fw-bold mb-1">Admin Login</h4>
            <p class="text-center text-muted mb-4">
                Sistem Pencatatan Kecelakaan Kerja
            </p>

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf

                @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('login_error') ?: $errors->first() }}
                </div>
                @endif

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="admin@telkom.co.id" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                        <span class="input-group-text bg-white">
                            <a href="javascript:;" style="color:#e60023;">
                                <i class="material-icons-outlined">visibility_off</i>
                            </a>
                        </span>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label">Remember Me</label>
                    </div>
                    <a href="#" class="text-danger">Lupa Password?</a>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-telkom">
                        Login ke Sistem
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <small class="text-muted">
                    © {{ date('Y') }} PT Telkom Indonesia
                </small>
            </div>

        </div>

    </div>
</div>
    

  <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("visibility_off");
          $('#show_hide_password i').removeClass("visibility");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("visibility_off");
          $('#show_hide_password i').addClass("visibility");
        }
      });
    });
  </script>

</body>
</html>