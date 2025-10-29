 <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar Jenis Surat - Bina Desa</title>
    <meta name="description" content="Halaman daftar jenis surat permohonan layanan mandiri desa.">
    <meta name="keywords" content="surat desa, permohonan, layanan mandiri">

    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    {{-- VENDOR CSS --}}
    <link href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    {{-- CUSTOM PAGE STYLE --}}
    <style>
        /* Styling utama untuk tampilan kartu jenis surat */
        .jenis-surat-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        .jenis-surat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            color: var(--primary-color, #0d6efd);
            line-height: 1;
        }

        .lead-intro {
            font-size: 1.15rem;
            color: #555;
        }

        /* --- CSS Modal Syarat Permohonan --- */
        .modal-header {
            border-bottom: 1px solid #eee;
            background-color: #f7f7f7;
        }

        .modal-body .list-group-item {
            border-left: 3px solid #0d6efd;
            border-right: none;
            border-top: none;
            padding-left: 15px;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .modal-body .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .modal-body .alert {
            font-size: 1rem;
        }
    </style>
