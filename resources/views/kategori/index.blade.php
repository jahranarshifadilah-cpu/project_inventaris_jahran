@extends('layouts.dashboard')

@section('title', 'Data Kategori')

@section('content')
<style>
    /* Styling Card & Table */
    .card-kategori {
        border-radius: 15px;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    .table thead th {
        background-color: #f8f9fa;
        color: #566a7f;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 700;
        padding: 15px;
    }
    /* Button Custom */
    .btn-create-kategori {
        background: linear-gradient(135deg, #03c3ec 0%, #0396ba 100%);
        border: none;
        color: white;
        border-radius: 8px;
        padding: 8px 16px;
    }
    .btn-create-kategori:hover {
        background: linear-gradient(135deg, #02b0d5 0%, #0285a5 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(3, 195, 236, 0.4);
    }
    /* Soft Action Buttons */
    .btn-soft-info { background-color: #e1faff; color: #03c3ec; border: none; }
    .btn-soft-warning { background-color: #fff2e2; color: #ffab00; border: none; }
    
    .btn-soft-info:hover { background-color: #03c3ec; color: #fff; }
    .btn-soft-warning:hover { background-color: #ffab00; color: #fff; }

    .search-input {
        border-radius: 8px 0 0 8px !important;
        border: 1px solid #d9dee3;
    }
    .search-btn {
        border-radius: 0 8px 8px 0 !important;
        background-color: #f5f5f9;
        border: 1px solid #d9dee3;
        color: #697a8d;
    }
    .category-badge {
        background-color: rgba(3, 195, 236, 0.1);
        color: #03c3ec;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 6px;
        display: inline-block;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Data Kategori</h4>
        <small class="text-muted">Kelola klasifikasi barang inventaris Anda</small>
    </div>
    <a href="{{ route('kategori.create') }}" class="btn btn-create-kategori">
        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
    </a>
</div>

{{-- SEARCH BOX --}}
<form method="GET" class="mb-4">
    <div class="input-group" style="max-width: 400px;">
        <input type="text" name="search" class="form-control search-input"
               placeholder="Cari nama kategori..." value="{{ request('search') }}">
        <button class="btn search-btn" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </div>
</form>

<div class="card card-kategori">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4" width="70">#</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th class="text-center" width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $item)
                <tr>
                    <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                    <td>
                        <span class="category-badge">{{ $item->nama }}</span>
                    </td>
                    <td>
                        <span class="text-secondary small">
                            {{ Str::limit($item->deskripsi, 60) ?? '-' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('kategori.show', $item) }}" 
                               class="btn btn-sm btn-soft-info px-3">
                                <i class="bi bi-eye-fill"></i> Detail
                            </a>
                            <a href="{{ route('kategori.edit', $item) }}" 
                               class="btn btn-sm btn-soft-warning px-3">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">
                        <i class="bi bi-tags display-4 d-block mb-2 opacity-25"></i>
                        Belum ada data kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 d-flex justify-content-end">
    {{ $kategori->links('pagination::bootstrap-5') }}
</div>

@endsection