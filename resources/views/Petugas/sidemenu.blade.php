<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" http://smpn4tuban.siap.web.id/sekolah-profil/#.YvfQ6XZBw2w "
                target="_blank">
                <img src="{{ asset('/img/smp4.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">SIP SMP Negeri 4 Tuban</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <ul class="navbar-nav">
            {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('pengguna') ? 'active' : '' }}" href="{{ route('pengguna') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Pengguna</span>
        </a>
      </li>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Katalog Buku</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('databuku') ? 'active' : '' }}" href="{{ route('databuku') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-books text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Buku</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('kategoribuku') ? 'active' : '' }}" href="{{ route('kategoribuku') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Kategori Buku</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('rakbuku') ? 'active' : '' }}" href="{{ route('rakbuku') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Rak Buku</span>
        </a>
      </li> --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}"
                    href="{{ route('laporan') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan SIP SMPN 4 Tuban</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('laporanbuku') ? 'active' : '' }}"
                    href="{{ route('laporanbuku') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('laporanpeminjaman') ? 'active' : '' }}"
                    href="{{ route('laporanpeminjaman') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('laporanpengembalian') ? 'active' : '' }}"
                    href="{{ route('laporanpengembalian') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan Pengembalian</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Transaksi</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('peminjaman') ? 'active' : '' }}" href="{{ route('peminjaman') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-folder-17 text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Peminjaman</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('pengembalian') ? 'active' : '' }}" href="{{ route('pengembalian') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pengembalian</span>
        </a>
      </li>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('denda') ? 'active' : '' }}" href="{{ route('denda') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Denda</span>
      </a> --}}
            {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}" href="{{ route('laporan') }}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-basket text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Laporan</span>
        </a>
      </li> --}}
        </ul>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
