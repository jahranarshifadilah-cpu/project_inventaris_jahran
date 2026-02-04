<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow-sm">
    <div class="app-brand demo py-3">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.35 0.35L3.39 7.44C0.56 9.69 -0.38 12.48 0.55 15.8C1.1 19.23 3.81 20.38 7.65 21.22L2.63 24.55C0.44 26.3 0.08 28.5 1.56 31.17C2.83 32.81 5.2 33.26 7.09 32.54C11.45 30 16.41 26.37 18.4 20.23C17.96 17.53 13.05 14.37 10.91 13.47L18.61 7.98L12.35 0.35Z" fill="#696cff" />
                    <path opacity="0.4" d="M13.79 0.35C13.57 0.51 5.47 6 5.47 6C4.05 8.21 4.36 10.07 6.4 11.57L15.5 14.43L18.61 7.98C15.53 3.11 13.92 0.57 13.79 0.35Z" fill="#696cff" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="letter-spacing: 1px;">INVAS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard Overview</div>
            </a>
        </li>

        @auth
        @if (auth()->user()->role === 'admin')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Administrator</span>
        </li>
        <li class="menu-item {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div>Manajemen User</div>
            </a>
        </li>
        @endif
        @endauth

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>

        <li class="menu-item {{ request()->routeIs(['kategori.*', 'barang.*', 'lokasi.*']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-box"></i>
                <div>Logistik & Barang</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('barang.index') ? 'active' : '' }}">
                    <a href="{{ route('barang.index') }}" class="menu-link">
                        <div>Daftar Barang</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}" class="menu-link">
                        <div>Kategori</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('lokasi.index') ? 'active' : '' }}">
                    <a href="{{ route('lokasi.index') }}" class="menu-link">
                        <div>Lokasi Gudang</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transaksi</span>
        </li>
        <li class="menu-item {{ request()->routeIs('peminjaman.index') ? 'active' : '' }}">
            <a href="{{ route('peminjaman.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-spreadsheet"></i>
                <div>Peminjaman Barang</div>
            </a>
        </li>
    </ul>
</aside>