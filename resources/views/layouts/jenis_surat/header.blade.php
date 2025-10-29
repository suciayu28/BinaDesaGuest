    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            {{-- LOGO DAN BRANDING --}}
            <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bina Desa</h1>
            </a>

            {{-- ========================== START SIDEBAR / NAVMENU ========================== --}}
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                    <li><a href="{{ route('jenis-surat.index') }}" class="active">Jenis Surat</a></li>
                    <li><a href="{{ route('permohonan.index') }}">Permohonan Surat</a></li>
                    <li><a href="#">Berkas Persyaratan</a></li>
                    <li><a href="#">Riwayat Status Surat</a></li>
                </ul>
                {{-- Tombol toggle untuk tampilan mobile --}}
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            {{-- ========================== END SIDEBAR / NAVMENU ========================== --}}

            {{-- SOCIAL LINKS HEADER --}}
            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>
