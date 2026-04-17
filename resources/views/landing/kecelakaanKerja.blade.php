@extends('landing.layouts.app')

@section('content')
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Kecelakaan Kerja</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Kecelakaan Kerja</li>
                </ol>
            </nav>
        </div>
    </div>
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