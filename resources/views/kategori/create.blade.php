@extends('layouts.dashboard')

@section('title', 'Tambah Kategori')

@section('content')
<style>
    .card-elegant {
        border-radius: 15px;
        border: none;
        background: #ffffff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    .form-label {
        font-weight: 600;
        color: #566a7f;
        font-size: 0.9rem;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #d9dee3;
        padding: 10px 15px;
    }
    .form-control:focus {
        border-color: #03c3ec; /* Warna Cyan/Teal yang cerah */
        box-shadow: 0 0 0 0.2rem rgba(3, 195, 236, 0.1);
    }
    .btn-save-kategori {
        background: linear-gradient(135deg, #03c3ec 0%, #0396ba 100%);
        border: none;
        color: #fff;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-save-kategori:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(3, 195, 236, 0.4);
        color: #fff;
    }
    .btn-back-kategori {
        background-color: #f5f5f9;
        color: #8592a3;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
    }
    .btn-back-kategori:hover {
        background-color: #e1e1e6;
        color: #697a8d;
    }
    .icon-header {
        width: 40px;
        height: 40px;
        background: rgba(3, 195, 236, 0.1);
        color: #03c3ec;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
</style>

<div class="d-flex align-items-center mb-4">
    <div class="icon-header">
        <i class="bi bi-tag-fill fs-5"></i>
    </div>
    <div>
        <h4 class="fw-bold mb-0">Tambah Kategori</h4>
        <small class="text-muted">Buat kelompok baru untuk klasifikasi barang</small>
    </div>
</div>

<div class="card card-elegant">
    <div class="card-body p-4">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">Nama Kategori</label>
                <div class="input-group input-group-merge">
                    <input type="text" name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" 
                           placeholder="Misal: Elektronik, Perabot, Alat Tulis..." required>
                </div>
                @error('nama')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" 
                          class="form-control" 
                          rows="4" 
                          placeholder="Berikan penjelasan singkat tentang kategori ini...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-save-kategori">
                    <i class="bi bi-cloud-arrow-up me-1"></i> Simpan Kategori
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-back-kategori">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection