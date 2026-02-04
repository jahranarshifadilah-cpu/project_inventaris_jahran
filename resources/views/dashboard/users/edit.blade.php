@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header py-3 d-flex align-items-center justify-content-between" 
                     style="background: linear-gradient(135deg, #ffab00 0%, #ffcf50 100%);">
                    <h5 class="text-white mb-0 fw-bold">
                        <i class="bx bx-edit-alt me-2"></i> Edit Profil User
                    </h5>
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-white shadow-sm fw-bold text-warning">
                        <i class="bx bx-chevron-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4 p-md-5">
                    <div class="alert alert-info border-0 shadow-sm mb-4" role="alert" style="border-radius: 10px;">
                        <i class="bx bx-info-circle me-2"></i>
                        Kosongkan <strong>Password</strong> jika tidak ingin mengubahnya.
                    </div>

                    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-user text-warning"></i></span>
                                    <input type="text" class="form-control border-start-0 bg-light @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label fw-bold">Email Bisnis</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-envelope text-warning"></i></span>
                                    <input type="email" class="form-control border-start-0 bg-light @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="role" class="form-label fw-bold">Tingkat Akses</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-shield-quarter text-warning"></i></span>
                                    <select class="form-select border-start-0 bg-light @error('role') is-invalid @enderror" id="role" name="role" required>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                                        <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                    </select>
                                </div>
                                @error('role')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label fw-bold">Ganti Password</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text bg-light border-end-0"><i class="bx bx-lock-open-alt text-warning"></i></span>
                                    <input type="password" class="form-control border-start-0 bg-light @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Tinggalkan kosong jika tidak ganti">
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted italic">Terakhir diperbarui: {{ $user->updated_at->diffForHumans() }}</small>
                            <div>
                                <button type="submit" class="btn btn-warning px-5 shadow text-white fw-bold">
                                    <i class="bx bx-check-circle me-1"></i> Perbarui Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-white { background: #fff; color: #ffab00; border: none; }
    .btn-white:hover { background: #fdfdfd; opacity: 0.9; }
    .input-group-text { border-color: #d9dee3; }
    .form-control:focus { border-color: #ffab00 !important; box-shadow: 0 0 0 0.2rem rgba(255, 171, 0, 0.1) !important; }
</style>
@endsection