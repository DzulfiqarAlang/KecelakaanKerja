@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <h5 class="mb-3">Hasil Pencarian : <b>"{{ $keyword }}"</b></h5>

        @if($results->count())

            <div class="table-responsive">
                <table class="table table-bordered align-middle table-hover custom-table">

                    <thead class="table-light text-center">
                        <tr>
                            <th width="60">No</th>
                            <th width="120">Foto</th>
                            <th>Nama Teknisi</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th width="140">Tanggal</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($results as $index => $item)

                            <tr>

                                <td class="text-center">{{ $index + 1 }}</td>

                                <td class="text-center">
                                    @if($item->foto)
                                        <img src="{{ route('admin.admin.kecelakaanKerja.image', $item->id) }}" class="table-img"
                                            oncontextmenu="return false" draggable="false">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>

                                <td>{{ $item->nama }}</td>

                                <td>{{ $item->deskripsi }}</td>

                                <td>{{ $item->lokasi }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                </td>

                                <td class="text-center">

                                    <div class="action-group">

                                        {{-- lihat --}}
                                        <a href="{{ route('admin.kecelakaan.detail', $item->id) }}"
                                            class="btn btn-danger btn-sm action-btn">
                                            <i class="material-icons-outlined">visibility</i>
                                        </a>

                                        {{-- edit --}}
                                        <button class="btn btn-warning btn-sm action-btn" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}">
                                            <i class="material-icons-outlined">edit</i>
                                        </button>

                                        {{-- print --}}
                                        <a href="{{ route('admin.kecelakaanKerja.report.single', $item->id) }}"
                                            class="btn btn-info btn-sm action-btn">
                                            <i class="material-icons-outlined">print</i>
                                        </a>

                                        {{-- delete --}}
                                        <form action="{{ route('admin.kecelakaanKerja.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm action-btn">
                                                <i class="material-icons-outlined">delete</i>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

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
                                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Kecelakaan</label>
                                    <textarea name="deskripsi" class="form-control" rows="3">{{ $item->deskripsi }}</textarea>
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

        @else

            <div class="alert alert-warning mt-3">
                Data tidak ditemukan.
            </div>

        @endif

    </div>
@endsection


@section('styles')
<style>
    .custom-table th {
        text-align: center;
        font-weight: 600;
    }

    .table-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    /* tombol aksi */
    .action-btn {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        padding: 0;
    }

    /* icon dalam tombol */
    .action-btn i {
        font-size: 18px;
    }

    /* jarak tombol */
    .action-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }
</style>