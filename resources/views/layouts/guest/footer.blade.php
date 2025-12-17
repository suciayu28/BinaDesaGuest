<footer id="footer" class="footer position-relative">

    <div class="container footer-top">
        <div class="row gy-4">

            <!-- ========================= -->
            <!--  ABOUT WEBSITE            -->
            <!-- ========================= -->
            <div class="col-lg-4 col-md-12 footer-about">
                <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center">
                    <span class="sitename">Layanan Surat</span>
                </a>
                <p>
                    Portal Layanan Mandiri dan Administrasi Surat Desa. Membantu masyarakat mengurus keperluan
                    administrasi secara cepat, transparan, dan terintegrasi secara digital.
                </p>

                <div class="social-links d-flex mt-4">

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/ssuciayuu?igsh=MTQ0bG05MGhxb2o1aQ%3D%3D&utm_source=qr"
                       target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/suci-dwimas-ayu-080006388/"
                       target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <!-- GitHub -->
                    <a href="https://github.com/suciayu28/BinaDesaGuest.git" target="_blank">
                        <i class="bi bi-github"></i>
                    </a>

                </div>
            </div>

            <!-- ========================= -->
            <!--  QUICK NAVIGATION         -->
            <!-- ========================= -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Navigasi Cepat</h4>
                <ul>
                    <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                    <li><a href="{{ route('permohonan.index') }}">Permohonan Surat</a></li>
                    <li><a href="#status">Lacak Status Surat</a></li>
                </ul>
            </div>

            <!-- ========================= -->
            <!--  INFORMATION LINKS        -->
            <!-- ========================= -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="#">Berita Desa</a></li>
                    <li><a href="{{ route('berkas.index') }}">Berkas Persyaratan</a></li>
                    <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                </ul>
            </div>

            <!-- ========================= -->
            <!--  CONTACT INFORMATION      -->
            <!-- ========================= -->
            <div class="col-lg-4 col-md-4 footer-contact">
                <h4>Hubungi Kami</h4>
                <p>Kantor Kepala Desa</p>
                <p>Jl. Utama Desa No. 10</p>
                <p>Kode Pos 535022</p>
                <p class="mt-4"><strong>Phone:</strong> <span>+62 812-3456-7890</span></p>
                <p><strong>Email:</strong> <span>info@layanansurat.go.id</span></p>
            </div>

        </div>

        <!-- ========================= -->
        <!--  DEVELOPER IDENTITAS      -->
        <!-- ========================= -->
        <div class="row gy-4 mt-5 justify-content-center">
            <div class="col-lg-4 col-md-6 text-center">

                <h4 class="mb-3">Identitas Pengembang</h4>

                <!-- FOTO -->
                <img src="{{ asset('assets-guest/img/profile/developer.jpeg') }}"
                     alt="Foto Pengembang"
                     class="img-fluid rounded-circle mb-3"
                     style="width:120px; height:120px; object-fit:cover;">

                <!-- DATA -->
                <p class="fw-bold mb-1">Suci Dwimas Ayu</p>
                <p class="small text-muted mb-1">NIM: 2457301136</p>
                <p class="small text-muted mb-3">Prodi: Sistem Informasi</p>

                <!-- SOSIAL MEDIA -->
                <div class="social-links d-flex justify-content-center gap-3">

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/ssuciayuu?igsh=MTQ0bG05MGhxb2o1aQ%3D%3D&utm_source=qr"
                       class="text-danger fs-4" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/suci-ayu-3728a2394/"
                       class="text-primary fs-4" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <!-- GitHub -->
                    <a href="https://github.com/suciayu28/BinaDesaGuest.git"
                       class="text-dark fs-4" target="_blank">
                        <i class="bi bi-github"></i>
                    </a>

                </div>

            </div>
        </div>

    </div>

    <!-- ========================= -->
    <!--  COPYRIGHT AREA           -->
    <!-- ========================= -->
    <div class="container copyright text-center mt-4">
        <p>
            © <span>{{ date('Y') }}</span>
            <strong class="px-1 sitename">Layanan Surat</strong>
            <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>
