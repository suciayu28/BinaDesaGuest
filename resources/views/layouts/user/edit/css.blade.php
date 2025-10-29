<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | Sistem Informasi Desa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS Kustom yang Menarik dan Modern (Konsisten dengan Daftar User) */
        :root {
            --primary-color: #004680; /* Hijau Tua/Desa */
            --secondary-color: #f8f9fa;
            --header-bg: var(--primary-color);
            --header-text: #ffffff;
            --footer-bg: #343a40;
            --footer-text: #ffffff;
            --body-bg: #e9ecef; /* Abu Sedang */
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--body-bg);
        }

        .content-wrap {
            flex: 1;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        /* HEADER Styling (Sederhana) */
        .main-header {
            background-color: var(--header-bg);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }

        .main-header .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--header-text) !important;
        }

        /* CARD/FORM Styling (Efek Card Mengambang) */
        .card-form {
            background-color: #ffffff;
            border-radius: 1rem; /* Sudut lebih melengkung */
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1); /* Shadow lebih halus */
            padding: 40px; /* Padding sedikit lebih besar */
            transition: transform 0.3s ease-in-out;
        }

        .card-form:hover {
            transform: translateY(-3px); /* Efek melayang saat kursor di atas */
        }

        /* Tombol */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #004680;
            border-color:#004680;
        }

        /* FOOTER Styling */
        .main-footer {
            padding: 20px 0;
            background-color: var(--footer-bg);
            color: var(--footer-text);
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
