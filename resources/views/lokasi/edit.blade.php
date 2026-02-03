@extends('layouts.dashboard')

@section('title', 'Data Lokasi')

@section('content')
<style>
    .card-custom {
        border-radius: 12px;
        border: none;
        overflow: hidden; /* Agar sudut tabel ikut rounded */
    }
    .table thead th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        color: #566a7f;
        border-bottom: 2px solid #f0f2f4;
    }
    .badge-location {
        background-color: rgba(105, 108, 255, 0.1);
        color: #696cff;
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 600;
    }
    .btn-add {
        background-color: #696cff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        transition: all 0.3s;
    }
    .btn-add:hover {
        background-color: #5f61e6;
        box-shadow: 0 4px 12px rgba(105, 108, 255, 0.3);
    }
    /* Warna tombol aksi yang lebih soft */
    .btn-soft-info { background-color: #e5f7ff; color: #00b5e9; border: none; }
    .btn-soft-warning { background-color: #fff8e5; color: #ffab00; border: none; }
    .btn-soft-danger { background-color: #ffebe6; color: #ff3e1d; border: none; }
    
    .btn-soft-info:hover { background-color: #00b5e9; color: white; }
    .btn-soft-warning:hover { background-color: #ffab00; color: white; }
    .btn-soft-danger:hover { background-color: #ff3e1d; color: white; }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Data Lokasi</h4>
        <small class="text-muted">Manajemen daftar gudang dan penempatan barang</small>
    </div>
    <a href="{{ route('lokasi.create') }}" class="btn btn-add text-white">
        <i class="bi bi-plus-lg me-1"></i> Tambah Lokasi
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
    <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card card-custom shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4" width="50">#</th>
                    <th>Nama Lokasi</th>
                    <th>Deskripsi</th>
                    <th class="text-center" width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lokasi as $item)
                <tr>
                    <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                    <td>
                        <span class="badge-location">{{ $item->nama }}</span>
                    </td>
                    <td>
                        <span class="text-secondary">{{ Str::limit($item->deskripsi, 50) ?? '-' }}</span>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('lokasi.show', $item->id) }}"
                               class="btn btn-soft-info btn-sm px-3">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                            <a href="{{ route('lokasi.edit', $item->id) }}"
                               class="btn btn-soft-warning btn-sm px-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('lokasi.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus lokasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-soft-danger btn-sm px-3">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <img src="https://illustrations.popsy.co/gray/box.svg" alt="empty" style="width: 100px;" class="mb-3">
                        <p class="text-muted">Data lokasi belum tersedia.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection