<header id="header" class="header d-flex align-items-center position-relative">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        {{-- Logo / Link Home --}}
        <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <i class="fa-solid fa-seedling me-2 text-success"></i>
            <h1 class="sitename">Bina Desa</h1>
        </a>

        {{-- Navigasi Utama --}}
        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="{{ route('guest.dashboard') }}">
                        <i class="fa-solid fa-house me-1"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('jenis-surat.index') }}">
                        <i class="fa-solid fa-file-lines me-1"></i> Jenis Surat
                    </a>
                </li>
                {{-- Tautan Permohonan Surat --}}
                <li>
                    <a href="{{ route('permohonan.index') }}">
                        <i class="fa-solid fa-envelope-open-text me-1"></i> Permohonan Surat
                    </a>
                </li>
                <li>
                    <a href="#berkas">
                        <i class="fa-solid fa-folder-open me-1"></i> Berkas Persyaratan
                    </a>
                </li>
                <li>
                    <a href="#status">
                        <i class="fa-solid fa-clipboard-check me-1"></i> Riwayat Status Surat
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="fa-solid fa-users me-1"></i> Data User
                    </a>
                </li>
                <li>
                    <a href="{{ route('warga.index') }}">
                        <i class="fa-solid fa-id-card me-1"></i> Data Warga
                    </a>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- Area Kontrol Login/Logout --}}
        <div class="header-social-links d-flex align-items-center">
            {{-- Tautan media sosial --}}
            <a href="#" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>

            {{-- TOMBOL LOGIN KONDISIONAL --}}
            @if(Auth::check())
                {{-- JIKA SUDAH LOGIN --}}
                <div class="dropdown ms-3">
                    <a class="btn btn-sm btn-outline-primary dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-circle me-1"></i> {{ Auth::user()->username ?? 'Pengguna' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li>
                            <a class="dropdown-item" href="{{ route('permohonan.index') }}">
                                <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i> Riwayat Surat Saya
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                {{-- JIKA BELUM LOGIN --}}
                <a href="{{ route('login.form') }}" class="btn btn-sm btn-primary ms-3 d-flex align-items-center">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                </a>
            @endif
        </div>
    </div>
</header>
