@extends('admin.layouts.app')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manajemen Data Kecelakaan Kerja</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2 rounded-3"
                data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="material-icons-outlined fs-5">add</i> Tambah Data Baru
            </button>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-4">
        <h4 class="fw-bold">Data Kecelakaan Kerja</h4>
        <small class="text-muted">Manajemen laporan kejadian teknisi lapangan</small>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover table-bordered">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="10%">Foto</th>
                            <th>Nama Teknisi</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kerja as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($item->foto)
                                        <img src="{{ route('admin.admin.kecelakaanKerja.image', $item->id) }}" width="60"
                                            height="60" class="rounded" style="object-fit: cover;" oncontextmenu="return false"
                                            draggable="false">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->tanggal->format('d M Y') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.kecelakaan.detail', $item->id) }}"
                                            class="btn btn-sm btn-primary" title="Detail">
                                            <i class="material-icons-outlined fs-6">visibility</i>
                                        </a>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}">
                                            <i class="material-icons-outlined fs-6">edit</i>
                                        </button>

                                        <a href="{{ route('admin.kecelakaanKerja.report.single', $item->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="material-icons-outlined fs-6">print</i>
                                        </a>

                                        <form action="{{ route('admin.kecelakaanKerja.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="material-icons-outlined fs-6">delete</i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $item->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0 py-2 bg-grd-warning">
                                            <h5 class="modal-title">Edit Data Kecelakaan kerja</h5>
                                            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                                <i class="material-icons-outlined">close</i>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.kecelakaanKerja.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Teknisi</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        value="{{ $item->nama }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi Kecelakaan</label>
                                                    <textarea name="deskripsi" class="form-control"
                                                        rows="3">{{ $item->deskripsi }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Lokasi</label>
                                                        <select name="lokasi" class="form-select" required>
                                                            <option value="Area Kudus" {{ $item->lokasi == 'Area Kudus' ? 'selected' : '' }}>
                                                                Area Kudus
                                                            </option>
                                                            <option value="Area Pati" {{ $item->lokasi == 'Area Pati' ? 'selected' : '' }}>
                                                                Area Pati
                                                            </option>
                                                            <option value="Area Jepara" {{ $item->lokasi == 'Area Jepara' ? 'selected' : '' }}>
                                                                Area Jepara
                                                            </option>
                                                            <option value="Area Blora" {{ $item->lokasi == 'Area Blora' ? 'selected' : '' }}>
                                                                Area Blora
                                                            </option>
                                                            <option value="Area Rembang" {{ $item->lokasi == 'Area Rembang' ? 'selected' : '' }}>
                                                                Area Rembang
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" name="tanggal" class="form-control"
                                                            value="{{ $item->tanggal ?? date('Y-m-d') }}" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Ganti Foto (Opsional)</label>
                                                    <input type="file" name="foto" class="form-control">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah
                                                        foto.</small>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-warning">Update Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data kecelakaan kerja.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="card p-3 mb-3">
                    <form method="GET" class="row g-3 align-items-end">

                        {{-- PILIH BULAN --}}
                        <div class="col-md-3">
                            <label class="form-label">Pilih Bulan</label>
                            <select name="month" class="form-select">
                                @for($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        {{-- PILIH TAHUN --}}
                        <div class="col-md-3">
                            <label class="form-label">Pilih Tahun</label>
                            <select name="year" class="form-select">
                                @for($y = date('Y'); $y >= 2020; $y--)
                                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        {{-- CETAK BULANAN --}}
                        <div class="col-md-3">
                            <button formaction="{{ route('admin.kecelakaanKerja.report.monthly') }}"
                                class="btn btn-outline-primary w-100">
                                Cetak Bulanan
                            </button>
                        </div>

                        {{-- CETAK TAHUNAN --}}
                        <div class="col-md-3">
                            <button formaction="{{ route('admin.kecelakaanKerja.report.yearly') }}"
                                class="btn btn-outline-success w-100">
                                Cetak Tahunan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 py-2 bg-grd-primary">
                    <h5 class="modal-title text-white">Tambah Data Baru</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.kecelakaanKerja.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Teknisi</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Kecelakaan</label>
                            <textarea name="deskripsi" class="form-control" rows="3"
                                placeholder="Deskripsi kecelakaan..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <select name="lokasi" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Lokasi --</option>
                                    <option value="Area Kudus">Area Kudus</option>
                                    <option value="Area Pati">Area Pati</option>
                                    <option value="Area Jepara">Area Jepara</option>
                                    <option value="Area Blora">Area Blora</option>
                                    <option value="Area Rembang">Area Rembang</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection