@extends('layouts.dashboard')

@section('title', 'Tambah Lokasi')

@section('content')
<style>
    .card-elegant {
        border-radius: 12px;
        border: none;
        background: #ffffff;
    }
    .form-label {
        font-weight: 600;
        color: #495057;
    }
    .form-control:focus {
        border-color: #696cff; /* Warna aksen biru lembut */
        box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.1);
    }
    .btn-save {
        background-color: #696cff; /* Indigo/Purple yang elegant */
        border-color: #696cff;
        color: #fff;
        padding: 8px 20px;
        border-radius: 8px;
        transition: all 0.3s;
    }
    .btn-save:hover {
        background-color: #5f61e6;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(105, 108, 255, 0.3);
    }
    .btn-back {
        background-color: #ebedef;
        border-color: #ebedef;
        color: #566a7f;
        padding: 8px 20px;
        border-radius: 8px;
    }
    .btn-back:hover {
        background-color: #dce0e4;
        color: #566a7f;
    }
</style>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Tambah Lokasi</h4>

<div class="card card-elegant shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('lokasi.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">Nama Lokasi</label>
                <input type="text" name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}" 
                       placeholder="Masukkan nama lokasi (contoh: Gudang A)" required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" 
                          class="form-control" 
                          rows="3" 
                          placeholder="Tambahkan detail informasi lokasi...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-save">
                    <i class="bi bi-check-circle me-1"></i> Simpan Lokasi
                </button>
                <a href="{{ route('lokasi.index') }}" class="btn btn-back">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection