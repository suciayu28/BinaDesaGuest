<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Riwayat Permohonan Surat - Bina Desa</title>
    <meta name="description" content="Halaman riwayat status permohonan surat layanan mandiri desa.">
    <meta name="keywords" content="surat desa, permohonan, riwayat, status">

    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Vendor CSS --}}
    <link href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- Main CSS --}}
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    <style>
        /* CSS yang relevan untuk tabel dan badge status */
        .status-badge {
            font-size: 0.85em;
            padding: 0.5em 0.8em;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            text-transform: uppercase;
        }

        .status-menunggu { background-color: #ffc107; color: #343a40; } /* Kuning (Info) */
        .status-diproses { background-color: #17a2b8; color: #fff; } /* Biru Muda (Processing) */
        .status-selesai { background-color: #28a745; color: #fff; } /* Hijau (Success) */
        .status-ditolak { background-color: #dc3545; color: #fff; } /* Merah (Danger) */

        .lead-intro {
            font-size: 1.15rem;
            color: #555;
        }
    </style>
</head>
