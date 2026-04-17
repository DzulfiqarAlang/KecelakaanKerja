@extends('landing.layouts.app')

@section('content')

    <div class="container-fluid page-header py-6 wow fadeIn">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white mb-3">Detail Kecelakaan Kerja</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-white" href="{{ url('/kecelakaan-kerja') }}">Kecelakaan Kerja</a>
                    </li>
                    <li class="breadcrumb-item text-primary active">Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-5">

            {{-- Gambar --}}
            <div class="col-lg-6">
                @if($data->foto)
                    <img class="img-fluid rounded shadow w-100"
                        src="{{ route('admin.admin.kecelakaanKerja.image', $data->id) }}" alt="{{ $data->nama }}"
                        style="max-height:450px; object-fit:cover;" oncontextmenu="return false" draggable="false">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:450px;">
                        <i class="fa fa-image fa-4x text-muted"></i>
                    </div>
                @endif
            </div>

            {{-- Informasi --}}
            <div class="col-lg-6">

                <h2 class="mb-4">{{ $data->nama }}</h2>

                <div class="mb-3">
                    <span class="badge bg-danger p-2">
                        <i class="fa fa-calendar-alt me-2"></i>
                        {{ $data->tanggal->format('d F Y') }}
                    </span>
                </div>

                <div class="mb-3">
                    <i class="fa fa-map-marker-alt text-danger me-2"></i>
                    <strong>Lokasi :</strong> {{ $data->lokasi }}
                </div>

                <hr>

                <h5>Deskripsi Kejadian</h5>
                <p style="text-align: justify;">
                    {{ $data->deskripsi }}
                </p>

                <a href="{{ url('/kecelakaan-kerja') }}" class="btn btn-telkom-red mt-4">
                    <i class="fa fa-arrow-left me-2"></i> Kembali ke daftar
                </a>

            </div>
        </div>
    </div>

@endsection