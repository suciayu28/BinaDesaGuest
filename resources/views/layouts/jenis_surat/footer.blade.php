    <footer id="footer" class="footer position-relative">
        <div class="container footer-top">
            <div class="row gy-4">
                {{-- Kolom Kiri: Deskripsi --}}
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Bina Desa</span>
                    </a>
                    <p>Portal layanan administrasi digital yang membantu masyarakat mengurus surat dengan cepat dan mudah.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                {{-- Kolom Tengah: Navigasi --}}
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Navigasi Cepat</h4>
                    <ul>
                        <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                        <li><a href="{{ route('permohonan.index') }}">Permohonan Surat</a></li>
                        <li><a href="#">Lacak Status</a></li>
                    </ul>
                </div>

                {{-- Kolom Kanan: Kontak --}}
                <div class="col-lg-3 col-md-4 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>Kantor Kepala Desa</p>
                    <p>Jl. Utama Desa No. 10</p>
                    <p>Kode Pos 535022</p>
                    <p class="mt-4"><strong>Phone:</strong> +1 5589 55488 55</p>
                    <p><strong>Email:</strong> info@binadesa.go.id</p>
                </div>
            </div>
        </div>

        <div class="container copyright text-center">
            <p>© <strong class="sitename">Bina Desa</strong>. All Rights Reserved</p>
        </div>
    </footer>
