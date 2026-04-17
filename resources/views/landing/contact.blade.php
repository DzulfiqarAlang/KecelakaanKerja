@extends('landing.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// Contact Us</p>
                <h1 class="display-6 mb-4">Telkom Witel Kudus</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="text-center mb-4">Telp. 6281290406090<br>
                        Email: official.witelkudus@gmail.com.<br><br></p>
                    <p class="text-center mb-4">Jl. Raya Pati - Kudus, Jati, Golantepus, Kec. Mejobo Kabupaten Kudus, Jawa
                        Tengah 59381</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Google Map Start -->
    <div class="container-xxl py-6 px-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="map-wrapper mx-auto">
            <iframe
                src="https://maps.google.com/maps?width=600&height=400&hl=en&q=warehouse%20telkom%20akses%20kudus&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <!-- Google Map End -->

@endsection