@extends('admin.layouts.app')

@section('content')

<div class="page-breadcrumb d-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Detail Laporan</div>
    <div class="ps-3">
        <nav>
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url()->previous() }}"><i class="bx bx-arrow-back"></i></a>
                </li>
                <li class="breadcrumb-item active">Detail Data Kecelakaan</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="row">

            <!-- FOTO -->
            <div class="col-md-5 text-center">
                @if($data->foto)
                <img src="{{ route('admin.admin.kecelakaanKerja.image', $data->id) }}"
                     class="img-fluid rounded shadow"
                     style="max-height:350px; object-fit:cover;">
                @else
                <div class="text-muted">Tidak ada foto</div>
                @endif
            </div>

            <!-- INFORMASI -->
            <div class="col-md-7">

                <h4 class="fw-bold mb-4">Informasi Kejadian</h4>

                <table class="table table-bordered">
                    <tr>
                        <th width="35%">Nama Teknisi</th>
                        <td>{{ $data->nama }}</td>
                    </tr>

                    <tr>
                        <th>Lokasi Kejadian</th>
                        <td>{{ $data->lokasi }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Kejadian</th>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                    </tr>

                    <tr>
                        <th>Deskripsi Kejadian</th>
                        <td style="white-space: pre-line;">
                            {{ $data->deskripsi }}
                        </td>
                    </tr>
                </table>

                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
                    Kembali
                </a>

            </div>
        </div>

    </div>
</div>

@endsection