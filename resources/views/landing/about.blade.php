@extends('landing.layouts.app')

@section('content')
  <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
   <div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5 justify-content-center text-center">    
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-4">Tentang Telkom Witel Kudus</h1>
                    <p>
                        Telkom Witel Kudus merupakan unit kerja dari PT Telkom Indonesia (Persero) Tbk yang bertanggung jawab dalam pengelolaan dan penyediaan layanan telekomunikasi di wilayah Kudus dan sekitarnya. Unit ini berperan penting dalam menjaga keandalan jaringan serta memastikan layanan telekomunikasi berjalan optimal bagi pelanggan.
                    </p>
                    <p>
                        Selain itu, Telkom Witel Kudus mendukung pengembangan infrastruktur dan solusi digital untuk pelanggan individu, bisnis, dan instansi pemerintahan. Dengan komitmen terhadap kualitas layanan dan inovasi berkelanjutan, Telkom Witel Kudus terus berkontribusi dalam mendukung transformasi digital dan kemajuan teknologi informasi di wilayah kerjanya.
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
                        <p>Sistem Pencatatan Kecelakaan Kerja Telkom Witel Kudus merupakan aplikasi berbasis web yang dirancang untuk membantu proses pencatatan, pengelolaan, dan pemantauan insiden kecelakaan kerja secara terstruktur dan terpusat.</p>
                        <p>Sistem ini mendukung kemudahan pelaporan serta penyajian data yang akurat untuk menunjang evaluasi keselamatan kerja.</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Pelaporan insiden secara cepat dan mudah
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Data tersimpan terpusat dan terorganisir
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Mendukung analisis dan evaluasi keselamatan kerja
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


    @endsection