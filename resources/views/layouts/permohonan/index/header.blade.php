<header id="header" class="header d-flex align-items-center position-relative">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Bina Desa</h1>
        </a>

        {{-- Navigasi Utama --}}
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('guest.dashboard') }}">Layanan Mandiri</a></li>
                <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                <li><a href="{{ route('permohonan.index') }}" class="active">Permohonan Surat</a></li>
                <li><a href="#">Berkas Persyaratan</a></li>
                <li><a href="#">Riwayat Status Surat</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
