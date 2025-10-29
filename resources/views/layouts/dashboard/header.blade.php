<header id="header" class="header d-flex align-items-center position-relative">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            {{-- Logo / Link Home --}}
            <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bina Desa</h1>
            </a>

            {{-- Navigasi Utama --}}
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                    <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>

                    {{-- Tautan Permohonan Surat (Kondisional: Jika Login, langsung ke form / Jika Belum, ke Login) --}}
                    <li>
                        <a href="{{ Auth::check() ? route('permohonan.create') : route('login.form') }}">
                            Permohonan Surat
                        </a>
                    </li>
                    <li><a href="#berkas">Berkas Persyaratan</a></li>
                    <li><a href="#status">Riwayat Status Surat</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- Area Kontrol Login/Logout --}}
            <div class="header-social-links d-flex align-items-center">
                {{-- Tautan media sosial --}}
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>

                {{-- TOMBOL LOGIN KONDISIONAL --}}
                @if(Auth::check())
                    {{-- JIKA SUDAH LOGIN --}}
                    <div class="dropdown ms-3">
                        {{-- Menggunakan Auth::user()->username untuk menampilkan username yang login --}}
                        <a class="btn btn-sm btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill me-1"></i> {{ Auth::user()->username ?? 'Pengguna' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('permohonan.index') }}">Riwayat Surat Saya</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    {{-- JIKA BELUM LOGIN --}}
                    <a href="{{ route('login.form') }}" class="btn btn-sm btn-primary ms-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                @endif
            </div>
        </div>
    </header>
