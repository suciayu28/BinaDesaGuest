 <footer id="footer" class="footer position-relative">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Bina Desa</span>
                    </a>
                    <p>Portal Layanan Mandiri dan Administrasi Surat Desa. Membantu masyarakat mengurus keperluan administrasi secara cepat, transparan, dan terintegrasi secara digital.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Navigasi Cepat</h4>
                    <ul>
                        <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                        <li><a href="#permohonan">Permohonan Surat</a></li>
                        <li><a href="#status">Lacak Status Surat</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#">Berita Desa</a></li>
                        <li><a href="#berkas">Berkas Persyaratan</a></li>
                        <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>Kantor Kepala Desa</p>
                    <p>Jl. Utama Desa No. 10</p>
                    <p>Kode Pos 535022</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@binadesa.go.id</span></p>
                </div>
            </div>
        </div>

        <div class="container copyright text-center">
            <p>© <span>Copyright</span><strong class="px-1 sitename">Bina Desa</strong><span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
