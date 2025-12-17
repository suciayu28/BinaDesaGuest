<header id="header" class="header d-flex align-items-center justify-content-between position-relative"
    style="background-color: #7493e3; padding: 20px 30px; font-size: 1.1rem;">

    {{-- Logo Vertikal Kiri --}}
    <a href="{{ route('guest.dashboard') }}" class="logo d-flex flex-column align-items-center">
        <img src="{{ asset('assets-guest/img/logo/logo.png') }}" alt="Logo Layanan Surat"
            style="height: 150px; width: auto; margin-bottom: 5px;">
        <span class="m-0" style="font-size: 1.6rem; font-weight: 700; color: #fff;">LAYANAN SURAT</span>
    </a>

    {{-- Navigasi Tengah --}}
    @auth
        <nav id="navmenu" class="navmenu flex-grow-1" style="text-align: center;">
            <ul style="display: inline-flex; gap: 20px; margin: 0; padding: 0; list-style: none;">
                <li><a href="{{ route('guest.dashboard') }}"><i class="fa-solid fa-house me-1"></i> Home</a></li>
                <li><a href="{{ route('jenis-surat.index') }}"><i class="fa-solid fa-file-lines me-1"></i> Jenis Surat</a>
                </li>
                <li><a href="{{ route('permohonan.index') }}"><i class="fa-solid fa-envelope-open-text me-1"></i> Permohonan
                        Surat</a></li>
                <li><a href="{{ route('berkas.index') }}"><i class="fa-solid fa-folder-open me-1"></i> Berkas
                        Persyaratan</a></li>
                <li><a href="{{ route('users.index') }}"><i class="fa-solid fa-users me-1"></i> Data User</a></li>
                <li><a href="{{ route('warga.index') }}"><i class="fa-solid fa-id-card me-1"></i> Data Warga</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    @endauth

    {{-- Area Login/Logout Kanan --}}
    <div class="header-social-links d-flex align-items-center" style="gap: 15px;">
        <!-- Instagram -->
                    <a href="https://www.instagram.com/ssuciayuu?igsh=MTQ0bG05MGhxb2o1aQ%3D%3D&utm_source=qr"
                       class="text-danger fs-4" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/suci-dwimas-ayu-080006388/"
                       class="text-primary fs-4" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <!-- GitHub -->
                    <a href="https://github.com/suciayu28/BinaDesaGuest.git"
                       class="text-dark fs-4" target="_blank">
                        <i class="bi bi-github"></i>
                    </a>
        @if (Auth::check())
            @php
                $user = Auth::user();
                // Jika ada foto, load. Jika tidak → fallback ke default-avatar.png
                $avatar = $user->avatar ?? 'default-avatar.png';
                $lastLogin = session('last_login');
            @endphp

            <div class="dropdown ms-3">
                <a class="d-flex align-items-center dropdown-toggle text-decoration-none" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">

                    {{-- Foto User --}}
                    <img src="{{ asset('assets-guest/img/profile/profile.png') }}"class="rounded-circle me-2"
                        style="width: 50px; height: 50px; object-fit: cover;">

                    {{-- Nama User --}}
                    <span class="fw-semibold text-dark">{{ $user->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    {{-- Last Login --}}
                    @if ($lastLogin)
                        <li class="dropdown-item text-muted small">
                            <i class="fa-regular fa-clock me-2"></i>
                            Login terakhir:
                            <br>
                            <strong>{{ \Carbon\Carbon::parse($lastLogin)->translatedFormat('d F Y H:i') }}</strong>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif

                    {{-- Logout --}}
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        @else
            <a href="{{ route('login.form') }}" class="btn btn-sm btn-primary ms-3 d-flex align-items-center">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Login
            </a>
        @endif
    </div>

</header>
