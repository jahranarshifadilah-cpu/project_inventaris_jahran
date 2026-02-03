@extends('layouts.dashboard')

@section('title', 'Detail Barang')

@section('content')
<style>
    .card-detail { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .info-box { background: #f8f9fa; border-radius: 12px; padding: 20px; height: 100%; border: 1px solid #eee; }
    .detail-label { font-size: 0.75rem; text-transform: uppercase; color: #a1acb8; font-weight: 700; display: block; margin-bottom: 5px; }
    .detail-value { color: #566a7f; font-weight: 600; font-size: 1.1rem; }
</style>

<div class="d-flex align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center">
        <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary me-3" style="border-radius: 10px;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="fw-bold mb-0">Informasi Aset</h3>
    </div>
    <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning text-white px-4" style="border-radius: 10px;">
        <i class="bi bi-pencil-square me-1"></i> Edit Data
    </a>
</div>

<div class="card card-detail">
    <div class="card-body p-4">
        <div class="mb-4 border-bottom pb-3">
            <span class="badge bg-primary mb-2" style="padding: 8px 15px;">{{ $barang->kode_barang }}</span>
            <h2 class="fw-bold text-dark">{{ $barang->nama_barang }}</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="detail-label">Kategori</span>
                    <span class="detail-value">{{ $barang->kategori->nama ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="detail-label">Lokasi</span>
                    <span class="detail-value">{{ $barang->lokasi->nama ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="detail-label">Status Kondisi</span>
                    <span class="badge {{ $barang->kondisi === 'baik' ? 'bg-success' : 'bg-warning' }} d-block mt-1" style="font-size: 1rem;">
                        {{ ucfirst($barang->kondisi) }}
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box text-center">
                    <span class="detail-label">Stok & harga</span>
                    <span class="detail-value" style="font-size: 2rem;">{{ $barang->jumlah }}</span>
                    <span class="text-muted ms-2">{{ $barang->satuan }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="detail-label">Riwayat Input</span>
                    <p class="mb-1 small">Dibuat: {{ $barang->created_at->format('d/m/Y H:i') }}</p>
                    <p class="small">Update: {{ $barang->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection