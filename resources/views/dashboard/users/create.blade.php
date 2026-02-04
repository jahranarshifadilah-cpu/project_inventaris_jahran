@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header bg-primary py-3 d-flex align-items-center justify-content-between">
                    <h5 class="text-white mb-0 fw-bold">
                        <i class="bx bx-user-plus me-2"></i> Tambah User Baru
                    </h5>
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-white shadow-sm fw-bold">
                        <i class="bx bx-chevron-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('dashboard.users.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label fw-bold text-dark">Nama Lengkap</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-user text-primary"></i></span>
                                    <input type="text" class="form-control border-start-0 bg-light @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Masukkan nama" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label fw-bold text-dark">Alamat Email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-envelope text-primary"></i></span>
                                    <input type="email" class="form-control border-start-0 bg-light @error('email') is-invalid @enderror" 
                                           id="email" name="email" placeholder="contoh@mail.com" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="role" class="form-label fw-bold text-dark">Hak Akses (Role)</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-shield-quarter text-primary"></i></span>
                                    <select class="form-select border-start-0 bg-light @error('role') is-invalid @enderror" id="role" name="role" required>
                                        <option value="" disabled selected>Pilih Role...</option>
                                        <option value="admin">Administrator</option>
                                        <option value="petugas">Petugas Lapangan</option>
                                    </select>
                                </div>
                                @error('role')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label fw-bold text-dark">Kata Sandi</label>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-lock-alt text-primary"></i></span>
                                    <input type="password" class="form-control border-start-0 bg-light @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="············" required>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2 text-end">
                            <button type="reset" class="btn btn-label-secondary px-4 me-2">Reset</button>
                            <button type="submit" class="btn btn-primary px-5 shadow-md">
                                <i class="bx bx-save me-1"></i> Simpan Data User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tombol Kembali putih bersih */
    .btn-white {
        background: #fff;
        color: #696cff;
        border: none;
    }
    .btn-white:hover {
        background: #f1f1f1;
        color: #5f61e6;
    }
    /* Input focus effect */
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        border-color: #696cff !important;
        box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.1);
    }
    .input-group-text {
        border-color: #d9dee3;
    }
    .shadow-md {
        box-shadow: 0 4px 10px rgba(105, 108, 255, 0.3);
    }
</style>
@endsection