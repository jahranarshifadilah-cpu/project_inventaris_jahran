@extends('layouts.dashboard')

@section('title', 'Daftar Barang')

@section('content')
<style>
    .card-table { border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden; }
    .table thead th { background-color: #f8f9fa; color: #566a7f; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px; font-weight: 700; padding: 15px; }
    .badge-soft-success { background-color: #e8fadf; color: #71dd37; padding: 6px 12px; border-radius: 6px; font-weight: 600; }
    .badge-soft-warning { background-color: #fff2e2; color: #ffab00; padding: 6px 12px; border-radius: 6px; font-weight: 600; }
    .badge-kode { background-color: #e7e7ff; color: #696cff; font-size: 0.7rem; padding: 4px 8px; border-radius: 5px; font-weight: 700; }
    .btn-action { width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; transition: 0.3s; border: none; text-decoration: none; }
    .btn-detail { background-color: #e7e7ff; color: #696cff; }
    .btn-edit { background-color: #fff2e2; color: #ffab00; }
    .btn-delete { background-color: #ffe5e5; color: #ff3e1d; }
    .btn-action:hover { transform: translateY(-2px); box-shadow: 0 3px 8px rgba(0,0,0,0.1); color: white !important; }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-0">Daftar Barang</h3>
        <p class="text-muted mb-0">Total inventaris tercatat tanpa lampiran foto.</p>
    </div>
    <a href="{{ route('barang.create') }}" class="btn btn-primary px-4 py-2" style="border-radius: 10px; background-color: #696cff; border: none;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Barang
    </a>
</div>

<div class="card card-table mb-4">
    <div class="card-body p-3">
        <form method="GET" class="row g-2">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Cari nama atau kode..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-4">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}" {{ request('kategori') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-primary w-100" style="border-radius: 8px;">
                    <i class="bi bi-filter me-1"></i> Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card card-table">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 50px;">#</th>
                    <th>Detail Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $item)
                    <tr>
                        <td class="ps-4 text-muted fw-bold">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-bold text-dark">{{ $item->nama_barang }}</div>
                            <span class="badge-kode">{{ $item->kode_barang }}</span>
                        </td>
                        <td><span class="text-muted">{{ $item->kategori->nama ?? '-' }}</span></td>
                        <td>
                            <div class="fw-bold">{{ $item->jumlah }}</div>
                            <small class="text-muted text-uppercase">{{ $item->satuan }}</small>
                        </td>
                        <td>
                            <span class="badge-soft-{{ $item->kondisi === 'baik' ? 'success' : 'warning' }}">
                                <i class="bi bi-circle-fill me-1" style="font-size: 8px;"></i> {{ ucfirst($item->kondisi) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('barang.show', $item) }}" class="btn-action btn-detail" title="Detail">
                                    <i class="bi bi-eye">detail</i>
                                </a>
                                <a href="{{ route('barang.edit', $item) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="bi bi-pencil-square">edit</i>
                                </a>
                                <form action="{{ route('barang.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus barang ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus">
                                        <i class="bi bi-trash">delete</i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-box2 display-1 text-light"></i>
                            <p class="text-muted mt-3">Data barang kosong.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection