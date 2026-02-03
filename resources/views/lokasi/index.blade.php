@extends('layouts.dashboard')

@section('title', 'Data Lokasi')

@section('content')
<style>
    .card-elegant {
        border-radius: 15px;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .table thead th {
        background-color: #f8f9fa;
        color: #566a7f;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 700;
        border-top: none;
    }
    .btn-create {
        background: linear-gradient(135deg, #696cff 0%, #3f42b5 100%);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
    }
    .btn-create:hover {
        background: linear-gradient(135deg, #5f61e6 0%, #353896 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(105, 108, 255, 0.4);
    }
    /* Soft Button Colors */
    .btn-soft-info {
        background-color: #e7e7ff;
        color: #696cff;
        border: none;
    }
    .btn-soft-warning {
        background-color: #fff2e2;
        color: #ffab00;
        border: none;
    }
    .btn-soft-danger {
        background-color: #ffe5e5;
        color: #ff3e1d;
        border: none;
    }
    .btn-soft-info:hover { background-color: #696cff; color: #fff; }
    .btn-soft-warning:hover { background-color: #ffab00; color: #fff; }
    .btn-soft-danger:hover { background-color: #ff3e1d; color: #fff; }
    
    .location-name {
        font-weight: 600;
        color: #566a7f;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Data Lokasi</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.8rem;">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Lokasi</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('lokasi.create') }}" class="btn btn-create">
        <i class="bi bi-plus-circle me-1"></i> Tambah Lokasi
    </a>
</div>

@if(session('success'))
<div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 10px; border: none; background-color: #e8fadf; color: #71dd37;">
    <i class="bi bi-check-circle-fill me-2"></i>
    <div>{{ session('success') }}</div>
</div>
@endif

<div class="card card-elegant">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4" width="60">#</th>
                    <th>Nama Lokasi</th>
                    <th>Deskripsi</th>
                    <th class="text-center" width="230">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lokasi as $item)
                <tr>
                    <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                    <td>
                        <div class="location-name text-primary">{{ $item->nama }}</div>
                    </td>
                    <td>
                        <span class="text-muted" style="font-size: 0.9rem;">
                            {{ $item->deskripsi ?: 'Tidak ada deskripsi' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('lokasi.show', $item->id) }}"
                               class="btn btn-soft-info btn-sm px-3">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                            <a href="{{ route('lokasi.edit', $item->id) }}"
                               class="btn btn-soft-warning btn-sm px-3">
                                <i class="bi bi-pencil-square"></i> Edit
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
                        <div class="text-muted">
                            <i class="bi bi-folder-x display-4"></i>
                            <p class="mt-2">Data lokasi belum tersedia</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection