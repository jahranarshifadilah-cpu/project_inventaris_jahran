@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-header border-bottom d-flex align-items-center justify-content-between py-3">
            <h5 class="card-title mb-0 fw-bold text-dark">
                <i class="bx bx-group me-2 text-primary"></i>Daftar Pengguna Sistem
            </h5>
            <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary shadow-sm px-4">
                <i class="bx bx-plus-circle me-1"></i> Add New User
            </a>
        </div>

        <div class="card-body pt-4">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover align-middle" id="users-table">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-bold">User</th>
                            <th class="fw-bold">Email</th>
                            <th class="fw-bold text-center">Role</th>
                            <th class="fw-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded-circle bg-label-primary shadow-sm">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <span class="fw-bold text-dark">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                @if($user->role === 'admin')
                                    <span class="badge bg-label-danger rounded-pill px-3">
                                        <i class="bx bx-crown me-1 small"></i> Administrator
                                    </span>
                                @else
                                    <span class="badge bg-label-info rounded-pill px-3">
                                        <i class="bx bx-user me-1 small"></i> Petugas
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                       class="btn btn-sm btn-icon btn-label-warning shadow-sm" 
                                       data-bs-toggle="tooltip" title="Edit User">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    {{-- Proteksi agar admin pertama tidak bisa dihapus --}}
                                    @if(!($loop->first && $user->role === 'admin'))
                                    <a href="{{ route('dashboard.users.destroy', $user->id) }}"
                                       class="btn btn-sm btn-icon btn-label-danger shadow-sm" 
                                       data-confirm-delete="true" 
                                       data-bs-toggle="tooltip" title="Delete User">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                    @else
                                    <button class="btn btn-sm btn-icon btn-label-secondary shadow-sm" disabled title="Protected Admin">
                                        <i class="bx bx-lock-alt"></i>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling khusus Datatables agar senada dengan UI kita */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #696cff !important;
        color: white !important;
        border: none !important;
        border-radius: 8px;
    }
    .dataTables_filter input {
        border-radius: 8px;
        border: 1px solid #d9dee3;
        padding: 5px 15px;
        margin-left: 10px;
    }
    .table thead th {
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }
    .avatar-initial {
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
</style>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.bootstrap5.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.6/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            "language": {
                "search": "Cari Pengguna:",
                "lengthMenu": "_MENU_ data per halaman"
            },
            "pageLength": 10,
            "columnDefs": [
                { "orderable": false, "targets": 3 } // Matikan sorting untuk kolom Aksi
            ]
        });
        
        // Inisialisasi tooltip Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endpush