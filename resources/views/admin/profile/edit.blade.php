@extends('admin.layouts.app')

@section('content')

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="mb-0 fw-semibold">Edit Profile</h4>

                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-outline-primary d-flex align-items-center gap-2 shadow-sm px-3">
                    <span>Kembali</span>
                </a>

            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                </div>

                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

@endsection