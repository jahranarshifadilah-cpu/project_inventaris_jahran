@extends('layouts.dashboard')

@section('title', 'Edit Barang')

@section('content')
<style>
    .card-barang { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .form-control, .form-select { border-radius: 10px; padding: 12px; }
    .btn-update { background: #696cff; color: white; border: none; padding: 12px 25px; border-radius: 10px; font-weight: 600; }
</style>

<div class="mb-4">
    <h3 class="fw-bold">Edit Barang</h3>
    <p class="text-muted">ID Sistem: #{{ $barang->id }}</p>
</div>

<div class="card card-barang">
    <div class="card-body p-4">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Kode Barang (Otomatis)</label>
                    <input type="text" class="form-control bg-light" value="{{ $barang->kode_barang }}" readonly>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="kategori_id" class="form-select">
                        @foreach($kategori as $cat)
                            <option value="{{ $cat->id }}" {{ $barang->kategori_id == $cat->id ? 'selected' : '' }}>{{ $cat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Lokasi</label>
                    <select name="lokasi_id" class="form-select">
                        @foreach($lokasi as $lok)
                            <option value="{{ $lok->id }}" {{ $barang->lokasi_id == $lok->id ? 'selected' : '' }}>{{ $lok->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $barang->jumlah }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="{{ $barang->satuan }}">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label fw-bold">Kondisi</label>
                    <select name="kondisi" class="form-select">
                        <option value="baik" {{ $barang->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak" {{ $barang->kondisi == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-update">Simpan Perubahan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-light ms-2" style="border-radius: 10px;">Batal</a>
        </form>
    </div>
</div>
@endsection