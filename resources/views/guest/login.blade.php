<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Layanan Mandiri</title>
    <style>
        /* CSS Sederhana untuk tampilan */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #eef1f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); width: 380px; }
        h2 { text-align: center; margin-bottom: 25px; color: #1e3a8a; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
        input[type="text"], input[type="password"] { width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; transition: border-color 0.3s; }
        input[type="text"]:focus, input[type="password"]:focus { border-color: #3b82f6; outline: none; }
        button { width: 100%; padding: 12px; background-color: #1e3a8a; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; font-weight: bold; transition: background-color 0.3s; }
        button:hover { background-color: #1c3275; }
        .alert { padding: 12px; margin-bottom: 15px; border-radius: 6px; font-size: 0.95rem; }
        .alert-success { background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-danger { background-color: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .text-danger { color: #dc2626; font-size: 0.85rem; margin-top: 5px; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>🔑 Login Layanan Mandiri</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('guest.layanan_mandiri.attempt') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nik">Nomor Induk Kependudukan (NIK)</label>
            <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                   placeholder="Masukkan 16 digit NIK" maxlength="16" required>

            @error('nik')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi Anda" required>

            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">MASUK KE LAYANAN MANDIRI</button>
    </form>
</div>

</body>
</html>
