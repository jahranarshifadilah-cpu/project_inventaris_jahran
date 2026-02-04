@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #696cff 0%, #a3a5ff 100%); border-radius: 15px;">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body text-white p-4">
                            <h4 class="card-title text-white mb-3">Halo, {{ Auth::user()->name }}! 👋</h4>
                            <p class="mb-4 opacity-75">
                                Manajemen inventaris hari ini terkendali. Ada <span class="badge bg-white text-primary fw-bold">{{ $pendingLoansCount ?? 5 }}</span> permintaan peminjaman baru yang butuh validasi Anda.
                            </p>
                            <a href="/peminjaman" class="btn btn-white text-primary fw-bold shadow-sm px-4">Tinjau Sekarang</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="150" alt="Inventory Admin" style="filter: drop-shadow(0px 10px 15px rgba(0,0,0,0.1));" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm transition-hover" style="border-left: 5px solid #03c3ec;">
                        <div class="card-body p-3">
                            <div class="badge bg-label-info p-2 mb-2 rounded-circle"><i class="bx bx-package fs-4"></i></div>
                            <span class="d-block mb-1 text-muted small fw-bold text-uppercase">Total Barang</span>
                            <h3 class="card-title mb-0 fw-bold">{{ $totalBarang ?? '1,240' }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm transition-hover" style="border-left: 5px solid #ffab00;">
                        <div class="card-body p-3 text-center">
                            <div class="badge bg-label-warning p-2 mb-2 rounded-circle"><i class="bx bx-time-five fs-4"></i></div>
                            <span class="d-block mb-1 text-muted small fw-bold text-uppercase">Dipinjam</span>
                            <h3 class="card-title mb-0 fw-bold">{{ $activeLoansCount ?? '48' }}</h3>
                            <small class="text-danger fw-bold mt-1 d-block"><i class='bx bxs-error-circle'></i> 3 Telat</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 order-2 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom pb-3">
                    <h5 class="card-title m-0 fw-bold"><i class="bx bx-bar-chart-alt-2 me-2"></i>Tren Aktivitas Inventaris</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button">Tahun 2026</button>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <div id="totalRevenueChart" style="min-height: 300px;"></div> 
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 order-3 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="card-title m-0 fw-bold text-dark">Aktivitas Terkini</h5>
                    <span class="badge bg-label-secondary rounded-pill">Hari Ini</span>
                </div>
                <div class="card-body pt-3">
                    <ul class="list-unstyled p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-3 bg-label-success shadow-sm"><i class="bx bx-undo"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0 fw-bold small">Kamera Canon EOS</h6>
                                    <small class="text-muted d-block">User: Andi Saputra</small>
                                </div>
                                <div class="user-progress">
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Kembali</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-3 bg-label-primary shadow-sm"><i class="bx bx-export"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0 fw-bold small">Laptop Dell XPS 13</h6>
                                    <small class="text-muted d-block">User: Budi Cahyo</small>
                                </div>
                                <div class="user-progress text-end">
                                    <small class="fw-semibold d-block">1 Jam Lalu</small>
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Pinjam</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-3 bg-label-danger shadow-sm"><i class="bx bx-alarm-exclamation"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0 fw-bold small text-danger">Proyektor Epson</h6>
                                    <small class="text-muted d-block">User: Citra Kirana</small>
                                </div>
                                <div class="user-progress">
                                    <span class="badge bg-danger text-white rounded-pill px-2" style="font-size: 10px;">Terlambat</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <a href="#" class="btn btn-sm btn-label-secondary w-100 mt-2">Lihat Semua Aktivitas</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .transition-hover { transition: all 0.3s ease; }
    .transition-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    .btn-white { background: #fff; color: #696cff; border: none; }
    .btn-white:hover { background: #f8f9fa; color: #5f61e6; }
</style>
@endsection