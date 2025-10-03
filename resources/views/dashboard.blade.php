<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: sans-serif; background-color: #e6ffe6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .message-container { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; }
        h1 { margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="message-container">
        <h1>✅ Selamat!</h1>
        <p>{!! $pesan !!}</p>
        <p>Anda telah berhasil melakukan login dengan kriteria khusus.</p>
        <a href="{{ route('login.form') }}">Kembali ke Login</a>
    </div>
</body>
</html>
