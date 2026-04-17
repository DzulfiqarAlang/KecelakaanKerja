@extends('landing.layouts.app')

@section('content')

    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('landing/img/bg2.png') }}" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-light text-uppercase fw-bold mb-2">Sistem Informasi Pencatatan Kecelakaan
                                    Kerja</p>
                                {{-- PERUBAHAN DI SINI: slideInDown menjadi slideInUp --}}
                                <h1 class="display-1 text-light mb-4 animated slideInUp">Telkom Witel Kudus</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Sistem berbasis web yang digunakan untuk pencatatan dan
                                    pengelolaan data kecelakaan kerja secara terstruktur dan terpusat.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('landing/img/bg.png') }}" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-light text-uppercase fw-bold mb-2">Sistem Informasi Pencatatan Kecelakaan
                                    Kerja</p>
                                {{-- PERUBAHAN DI SINI: slideInDown menjadi slideInUp --}}
                                <h1 class="display-1 text-light mb-4 animated slideInUp">Telkom Witel Kudus</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Mewujudkan lingkungan kerja yang lebih aman melalui
                                    pencatatan, pelaporan, dan monitoring kejadian kecelakaan secara cepat, akurat, dan
                                    terintegrasi.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5 justify-content-center text-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-4">Tentang Telkom Witel Kudus</h1>
                        <p>
                            Telkom Witel Kudus merupakan unit kerja dari PT Telkom Indonesia (Persero) Tbk yang bertanggung
                            jawab dalam pengelolaan dan penyediaan layanan telekomunikasi di wilayah Kudus dan sekitarnya.
                            Unit ini berperan penting dalam menjaga keandalan jaringan serta memastikan layanan
                            telekomunikasi berjalan optimal bagi pelanggan.
                        </p>
                        <p>
                            Selain itu, Telkom Witel Kudus mendukung pengembangan infrastruktur dan solusi digital untuk
                            pelanggan individu, bisnis, dan instansi pemerintahan. Dengan komitmen terhadap kualitas layanan
                            dan inovasi berkelanjutan, Telkom Witel Kudus terus berkontribusi dalam mendukung transformasi
                            digital dan kemajuan teknologi informasi di wilayah kerjanya.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="{{ asset('landing/img/about1.png') }}" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="{{ asset('landing/img/about2.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-4">Tentang Sistem Pencatatan Kecelakaan Kerja</h1>
                        <p>Sistem Pencatatan Kecelakaan Kerja Telkom Witel Kudus merupakan aplikasi berbasis web yang
                            dirancang untuk membantu proses pencatatan, pengelolaan, dan pemantauan insiden kecelakaan kerja
                            secara terstruktur dan terpusat.</p>
                        <p>Sistem ini mendukung kemudahan pelaporan serta penyajian data yang akurat untuk menunjang
                            evaluasi keselamatan kerja.</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Pelaporan insiden secara cepat dan mudah
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Data tersimpan terpusat dan terorganisir
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Mendukung analisis dan evaluasi keselamatan
                                kerja
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Akses sistem sesuai dengan hak pengguna
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- HEADER SECTION -->
    <div class="container-xxl bg-light py-6">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-6 fw-bold text-dark">Riwayat Kecelakaan Kerja</h1>
                <p class="text-muted">
                    Data insiden kecelakaan kerja yang tercatat secara terpusat dan terstruktur
                </p>
            </div>

            <div class="row g-4">
                @forelse($kerja as $k)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm h-100">

                            <!-- Gambar -->
                            @if($k->foto)
                                <img src="{{ route('admin.admin.kecelakaanKerja.image', $k->id) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;" alt="{{ $k->nama }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height:220px;">
                                    <i class="fa fa-image fa-3x text-muted"></i>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">

                                <!-- Tanggal -->
                                <span class="badge bg-danger align-self-start mb-3">
                                    <i class="fa fa-calendar-alt me-1"></i>
                                    {{ $k->tanggal->format('d M Y') }}
                                </span>

                                <!-- Nama -->
                                <h5 class="fw-bold text-dark">{{ $k->nama }}</h5>

                                <!-- Lokasi -->
                                <p class="text-muted mb-2">
                                    <i class="fa fa-map-marker-alt text-danger me-2"></i>
                                    {{ $k->lokasi }}
                                </p>

                                <!-- Deskripsi -->
                                <p class="text-muted small flex-grow-1">
                                    {{ Str::limit($k->deskripsi, 100) }}
                                </p>

                                <!-- Tombol -->
                                <a href="{{ route('kecelakaan.detail', $k->id) }}" class="btn btn-outline-danger mt-3">
                                    Lihat Detail
                                </a>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="bg-white shadow-sm rounded p-5 text-center">
                            <i class="fa fa-folder-open fa-3x text-muted mb-3"></i>
                            <h5 class="fw-bold">Belum Ada Data</h5>
                            <p class="text-muted mb-0">
                                Data kecelakaan kerja akan muncul setelah laporan tersedia.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    {{-- END BAGIAN PRODUK --}}
    <script>
        document.addEventListener("contextmenu", function (e) {
            if (e.target.tagName === "IMG") {
                e.preventDefault();
            }
        });
    </script>
    </div>
    </div>
@endsection