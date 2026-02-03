@extends('layouts.dashboard')

@section('title', 'Edit Kategori')

@section('content')
<style>
    .card-edit {
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
    .form-control:focus {
        border-color: #ffab00; /* Warna Orange/Amber Edit */
        box-shadow: 0 0 0 0.2rem rgba(255, 171, 0, 0.1);
    }
    .btn-update {
        background: linear-gradient(135deg, #ffab00 0%, #ff8a00 100%);
        border: none;
        color: #fff;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 171, 0, 0.4);
        color: #fff;
    }
    .btn-cancel {
        background-color: #f5f5f9;
        color: #8592a3;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
    }
    .btn-cancel:hover {
        background-color: #e1e1e6;
        color: #697a8d;
    }
    .icon-edit-header {
        width: 40px;
        height: 40px;
        background: rgba(255, 171, 0, 0.1);
        color: #ffab00;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
</style>

<div class="d-flex align-items-center mb-4">
    <div class="icon-edit-header">
        <i class="bi bi-pencil-square fs-5"></i>
    </div>
    <div>
        <h4 class="fw-bold mb-0">Edit Kategori</h4>
        <small class="text-muted">Perbarui informasi klasifikasi barang Anda</small>
    </div>
</div>

<div class="card card-edit">
    <div class="card-body p-4">
        <form action="{{ route('kategori.update', $kategori) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $kategori->nama) }}" 
                       placeholder="Masukkan nama kategori..." required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" 
                          class="form-control" 
                          rows="4" 
                          placeholder="Berikan penjelasan singkat tentang kategori ini...">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
            </div>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-update">
                    <i class="bi bi-check2-all me-1"></i> Perbarui Data
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection