<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        h2 { text-align: center; color: #333; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 8px 0 15px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #5cb85c; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        button:hover { background-color: #4cae4c; }
        .alert { padding: 10px; margin-bottom: 10px; border: 1px solid transparent; border-radius: 4px; color: #a94442; background-color: #f2dede; border-color: #ebccd1; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>LOGIN 🔒</h2>

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
            @csrf <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Harus sama dengan password">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Min 3 kar., ada huruf kapital">

            <button type="submit">MASUK</button>
        </form>
    </div>
</body>
</html>
