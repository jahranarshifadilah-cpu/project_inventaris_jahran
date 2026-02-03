@extends('layouts.dashboard')

@section('title', 'Detail Lokasi')

@section('content')
<style>
    .detail-card {
        border-radius: 15px;
        border: none;
        background: #fff;
    }
    .detail-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #a1acb8;
        font-weight: 700;
        margin-bottom: 5px;
    }
    .detail-value {
        font-size: 1.1rem;
        color: #566a7f;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .icon-box {
        width: 45px;
        height: 45px;
        background: rgba(105, 108, 255, 0.1);
        color: #696cff;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 15px;
    }
    .btn-edit-soft {
        background-color: #fff2e2;
        color: #ffab00;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
    }
    .btn-edit-soft:hover {
        background-color: #ffab00;
        color: #fff;
    }
    .btn-back-soft {
        background-color: #f5f5f9;
        color: #8592a3;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
    }
    .btn-back-soft:hover {
        background-color: #8592a3;
        color: #fff;
    }
</style>

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Lokasi /</span> Detail Data
</h4>

<div class="card detail-card shadow-sm">
    <div class="card-body p-4">
        <div class="d-flex align-items-start mb-4">
            <div class="icon-box">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div>
                <div class="detail-label">Nama Lokasi</div>
                <div class="detail-value text-primary">{{ $lokasi->nama }}</div>
            </div>
        </div>

        <div class="d-flex align-items-start mb-4">
            <div class="icon-box" style="background: rgba(133, 146, 163, 0.1); color: #8592a3;">
                <i class="bi bi-justify-left"></i>
            </div>
            <div class="w-100">
                <div class="detail-label">Deskripsi Lokasi</div>
                <div class="detail-value" style="font-weight: 400; line-height: 1.6;">
                    {{ $lokasi->deskripsi ?? 'Tidak ada deskripsi tambahan untuk lokasi ini.' }}
                </div>
            </div>
        </div>

        <hr class="my-4" style="opacity: 0.1;">

        <div class="d-flex gap-2">
            <a href="{{ route('lokasi.edit', $lokasi) }}" class="btn btn-edit-soft">
                <i class="bi bi-pencil-square me-1"></i> Edit Data
            </a>
            <a href="{{ route('lokasi.index') }}" class="btn btn-back-soft">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection