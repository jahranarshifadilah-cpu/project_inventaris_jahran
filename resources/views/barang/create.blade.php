@extends('layouts.dashboard')

@section('title', 'Tambah Barang')

@section('content')
<style>
    .card-barang { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .form-label { font-weight: 600; color: #566a7f; margin-bottom: 8px; }
    .form-control, .form-select { border-radius: 10px; padding: 12px; border: 1px solid #d9dee3; }
    .form-control:focus { border-color: #696cff; box-shadow: 0 0 0 0.25rem rgba(105, 108, 255, 0.1); }
    .btn-save-barang { 
        background: linear-gradient(135deg, #696cff 0%, #3f42b5 100%); 
        border: none; color: white; padding: 12px 30px; border-radius: 10px; font-weight: 600; transition: 0.3s;
    }
    .btn-save-barang:hover { transform: translateY(-3px); box-shadow: 0 8px 15px rgba(105, 108, 255, 0.4); color: white; }
    .header-icon { width: 50px; height: 50px; background: rgba(105, 108, 255, 0.1); color: #696cff; border-radius: 12px; display: flex; align-items: center; justify-content: center; }
</style>

<div class="d-flex align-items-center mb-4">
    <div class="header-icon me-3">
        <i class="bi bi-box-seam fs-4"></i>
    </div>
    <div>
        <h3 class="fw-bold mb-0">Tambah Barang Baru</h3>
        <p class="text-muted mb-0">Masukkan detail informasi aset/barang inventaris.</p>
    </div>
</div>

<div class="card card-barang">
    <div class="card-body p-4">
        {{-- Jangan lupa tambahkan enctype jika nanti ada upload gambar --}}
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
               {{-- KODE BARANG (Otomatis) --}}
<div class="col-md-12 mb-4">
    <label class="form-label">Kode Barang</label>
    <input type="text" name="kode_barang" class="form-control bg-light" 
           value="{{ $kodeOtomatis }}" readonly>
    <small class="text-muted">Kode ini dibuat otomatis oleh sistem.</small>
</div>
                {{-- NAMA BARANG --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" 
                           placeholder="Contoh: Laptop MacBook Pro 2024" value="{{ old('nama_barang') }}" required>
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KATEGORI --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Kategori...</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- LOKASI --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Lokasi Penempatan</label>
                    <select name="lokasi_id" class="form-select @error('lokasi_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Lokasi...</option>
                        @foreach($lokasi as $item)
                            <option value="{{ $item->id }}" {{ old('lokasi_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- JUMLAH --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" 
                           placeholder="0" value="{{ old('jumlah') }}" required>
                </div>

                {{-- SATUAN --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Satuan</label>
                    <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" 
                           placeholder="Pcs/Unit/Box" value="{{ old('satuan') }}" required>
                </div>

                {{-- KONDISI --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Kondisi</label>
                    <select name="kondisi" class="form-select">
                        <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik (Layak Pakai)</option>
                        <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak (Butuh Perbaikan)</option>
                    </select>
                </div>
            </div>

            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-save-barang">
                    <i class="bi bi-check-lg me-1"></i> Simpan Inventaris
                </button>
                <a href="{{ route('barang.index') }}" class="btn btn-light px-4" style="border-radius: 10px;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection