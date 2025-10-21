<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login | Layanan Desa</title>
    <style>
        /* BASE & LAYOUT */
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font modern */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;

            /* Latar Belakang Pemandangan Desa/Alam */
            background-image: url('https://picsum.photos/1920/1080?random=1'); /* Ganti dengan URL gambar desa Anda */
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* OVERLAY (untuk meningkatkan kontras dan efek blur) */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* Efek overlay gelap lembut untuk menonjolkan form */
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px); /* Efek BLUR pada latar belakang */
            z-index: 1;
        }

        /* LOGIN CONTAINER (Kartu Kaca/Glassmorphism Ringan) */
        .login-container {
            background: rgba(255, 255, 255, 0.95); /* Sedikit transparan */
            padding: 50px 40px; /* Padding lebih besar */
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); /* Bayangan yang menonjol */
            width: 400px;
            max-width: 90%;
            z-index: 2; /* Di atas overlay */
            transition: all 0.4s ease-in-out;
            border-left: 5px solid #007bff; /* Garis aksen biru yang menarik */
        }
        .login-container:hover {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        /* HEADER */
        h2 {
            text-align: center;
            color: #007bff; /* Warna biru untuk branding */
            margin-bottom: 35px;
            font-weight: 700;
            font-size: 1.8em;
            letter-spacing: 0.5px;
        }

        /* INPUT FIELD */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #495057; /* Abu-abu gelap */
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 25px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f8f9fa; /* Latar input sedikit abu-abu */
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.25); /* Efek fokus biru */
        }

        /* BUTTON (Warna Biru Kontras) */
        button {
            background-color: #007bff; /* Biru Primer yang Kuat */
            color: white;
            padding: 16px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: background-color 0.3s, transform 0.1s, box-shadow 0.3s;
        }
        button:hover {
            background-color: #0056b3; /* Biru lebih gelap saat hover */
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        /* ALERT/ERROR */
        .alert {
            padding: 15px;
            margin-bottom: 25px;
            border: 1px solid #dc3545; /* Merah untuk batas */
            border-radius: 8px;
            color: #721c24;
            background-color: #f8d7da;
            box-shadow: 0 2px 5px rgba(220, 53, 69, 0.1);
        }
        .alert ul { margin: 0; padding-left: 20px; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2>Layanan Mandiri & Surat</h2>
        <p style="text-align: center; color: #6c757d; margin-top: -20px; margin-bottom: 30px;">
            Akses cepat ke semua layanan publik desa Anda.
        </p>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @if (session('gagal'))
                        <li>{{ session('gagal') }}</li>
                    @endif
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username Anda" value="{{ old('username') }}">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Min 3 kar., ada huruf kapital" autocomplete="off">

            <button type="submit">LOGIN SEKARANG</button>
        </form>
    </div>
</body>
</html>
