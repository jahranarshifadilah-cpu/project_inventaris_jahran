@extends('layouts.dashboard')

@section('title', 'Detail Kategori')

@section('content')
<style>
    .detail-card {
        border-radius: 15px;
        border: none;
        background: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    .detail-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #a1acb8;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .detail-value {
        font-size: 1.05rem;
        color: #566a7f;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .icon-box-kategori {
        width: 48px;
        height: 48px;
        background: rgba(3, 195, 236, 0.1);
        color: #03c3ec;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
    }
    .time-badge {
        background-color: #f5f5f9;
        color: #8592a3;
        padding: 4px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    .btn-edit-soft {
        background-color: #fff2e2;
        color: #ffab00;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-edit-soft:hover { background-color: #ffab00; color: #fff; }

    .btn-back-soft {
        background-color: #f5f5f9;
        color: #8592a3;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-back-soft:hover { background-color: #8592a3; color: #fff; }
</style>

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Kategori /</span> Detail Informasi
</h4>

<div class="card detail-card">
    <div class="card-body p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-kategori me-3">
                        <i class="bi bi-tag-fill"></i>
                    </div>
                    <div>
                        <div class="detail-label">Nama Kategori</div>
                        <div class="detail-value text-info mb-0" style="font-size: 1.4rem;">{{ $kategori->nama }}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-4">
                <div class="detail-label">Deskripsi</div>
                <div class="detail-value text-secondary" style="font-weight: 400; max-width: 800px;">
                    {{ $kategori->deskripsi ?? 'Tidak ada deskripsi untuk kategori ini.' }}
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="detail-label">Tanggal Dibuat</div>
                <div class="mt-1">
                    <span class="time-badge">
                        <i class="bi bi-calendar-plus me-1"></i> {{ $kategori->created_at->format('d F Y, H:i') }}
                    </span>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="detail-label">Pembaruan Terakhir</div>
                <div class="mt-1">
                    <span class="time-badge">
                        <i class="bi bi-clock-history me-1"></i> {{ $kategori->updated_at->format('d F Y, H:i') }}
                    </span>
                </div>
            </div>
        </div>

        <hr class="my-3 opacity-50">

        <div class="d-flex gap-2">
            <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-edit-soft">
                <i class="bi bi-pencil-square me-1"></i> Edit Kategori
            </a>
            <a href="{{ route('kategori.index') }}" class="btn btn-back-soft">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection