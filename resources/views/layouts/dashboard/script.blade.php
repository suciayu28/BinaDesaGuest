<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
        {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/08877573317?text=Halo%20Admin,%20saya%20butuh%20bantuan."
       class="whatsapp-float"
       target="_blank"
       title="Chat via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            right: 25px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 35px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.3);
            z-index: 9999;
            transition: all 0.3s ease;
        }

        .whatsapp-float i {
            margin-top: 12px;
        }

        .whatsapp-float:hover {
            background-color: #20ba5a;
            transform: scale(1.1);
        }
    </style>

