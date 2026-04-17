<!doctype html>


<head>
    @include('admin.layouts.head')

    <style>
        /* ========== WARNA UTAMA TELKOM ========== */
        :root {
            --telkom-red: #e60023;
            --telkom-red2: #ff4b2b;
        }

        /* background halaman admin */
        .content-wrapper,
        .page-content {
            background: #f5f7fb !important;
        }

        /* breadcrumb header */
        .page-breadcrumb {
            background: linear-gradient(135deg, var(--telkom-red), var(--telkom-red2));
            padding: 18px 22px;
            border-radius: 14px;
            color: white;
            box-shadow: 0 6px 18px rgba(230, 0, 35, .25);
        }

        .page-breadcrumb .breadcrumb-title,
        .page-breadcrumb .breadcrumb-item,
        .page-breadcrumb i {
            color: white !important;
        }

        /* CARD UTAMA */
        .card {
            border: none !important;
            border-radius: 18px !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        /* TABLE */
        .table thead {
            background: linear-gradient(135deg, #e60023, #ff4b2b);
            color: white;
        }

        .table thead th {
            border: none !important;
        }

        .table tbody tr:hover {
            background: #fff5f6;
        }

        /* BUTTON PRIMARY */
        .btn-primary {
            background: linear-gradient(135deg, #e60023, #ff4b2b) !important;
            border: none !important;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(230, 0, 35, .35);
        }

        /* tombol aksi */
        .btn-warning {
            background: #ffc107;
            border: none;
            border-radius: 10px;
        }

        .btn-danger {
            border-radius: 10px;
        }

        .btn-info {
            background: #0dcaf0;
            border-radius: 10px;
        }

        /* MODAL HEADER */
        .bg-grd-primary {
            background: linear-gradient(135deg, #e60023, #ff4b2b) !important;
        }

        .bg-grd-warning {
            background: linear-gradient(135deg, #ff9800, #ffc107) !important;
        }

        /* FORM */
        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: #e60023;
            box-shadow: 0 0 0 0.15rem rgba(230, 0, 35, .25);
        }

        /* gambar thumbnail */
        .table img {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
        }
    </style>

    @yield('styles')

</head>

<body>
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <main class="main-wrapper">
        <div class="main-content">

            @yield('content')

        </div>
    </main>
    @include('admin.layouts.footer')

    @include('admin.layouts.scripts')

    @yield('scripts')
</body>

</html>