<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme shadow-sm" id="layout-navbar" style="border-radius: 12px; margin-top: 15px;">
    
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        
        <div class="navbar-nav align-items-center flex-grow-1">
            <div class="nav-item d-flex align-items-center w-75">
                <i class="bx bx-search fs-4 lh-0 text-primary"></i>
                <input type="text" class="form-control border-0 shadow-none ps-3" placeholder="Cari barang atau nomor peminjaman..." aria-label="Search..." />
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item me-3">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="bx bx-bell bx-sm"></i>
                        <span class="badge badge-center rounded-pill bg-danger border border-white position-absolute translate-middle" style="font-size: 0.6rem; top: 5px; left: 18px;">3</span>
                    </div>
                </a>
                </li>

            <li class="nav-item me-3 d-none d-md-block">
                <div class="vr" style="height: 30px; opacity: 0.1;"></div>
            </li>

            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="d-flex align-items-center">
                        <div class="text-end me-2 d-none d-sm-block">
                            <span class="fw-bold d-block mb-0" style="font-size: 0.85rem;">{{ Auth::user()->name }}</span>
                            <small class="text-muted text-capitalize" style="font-size: 0.75rem;">{{ Auth::user()->role }}</small>
                        </div>
                        <div class="avatar avatar-online shadow-sm">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle border border-2 border-primary" />
                        </div>
                    </div>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 py-2" style="border-radius: 12px; width: 230px;">
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-bold d-block">{{ Auth::user()->name }}</span>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li><div class="dropdown-divider opacity-50"></div></li>
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <i class="bx bx-user-circle me-3 text-primary"></i>
                            <span class="align-middle">Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <i class="bx bx-cog me-3 text-primary"></i>
                            <span class="align-middle">Pengaturan</span>
                        </a>
                    </li>
                    <li><div class="dropdown-divider opacity-50"></div></li>
                    <li>
                        <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out-circle me-3"></i>
                            <span class="align-middle">Keluar Sistem</span>
                        </a>
                        <form action="{{ route('logout') }}" method="post" id="logout-form" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<style>
    /* Transisi Halus pada Dropdown */
    .dropdown-menu {
        animation: fadeIn 0.3s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    /* Style Navbar agar terlihat detached/melayang */
    .layout-navbar {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9) !important;
    }
</style>