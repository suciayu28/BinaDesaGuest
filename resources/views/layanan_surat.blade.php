<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Layanan Mandiri & Surat - BinaDesaGuest</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            background: #f6f8fa;
            min-height: 100vh;
        }
        .container {
            /* PENTING: Dibuat lebih lebar (95% dari layar) */
            max-width: 95%;
            /* Margin tetap auto agar di tengah */
            margin: 32px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(44,62,80,0.07);
            padding: 24px 20px;
        }
        h1 {
            text-align: center;
            color: #eb25a2;
            margin-bottom: 18px;
            font-size: 1.35em;
            font-weight: 300;
            letter-spacing: 0.5px;
        }
        .subtitle {
            text-align: center;
            color: #8b647b;
            font-size: 0.95em;
            margin-bottom: 18px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 8px;
            background: #fff;
        }
        th, td {
            border: 1px solid #e5e7eb;
            padding: 8px 10px;
            text-align: left;
            font-size: 0.98em;
            vertical-align: top;
        }
        th {
            background:  #eb25a2;
            color: #fff;
            font-weight: 300;
        }
        tr:nth-child(even) td {
            background: #f3f6fa;
        }
        tr:hover td {
            background: #e0e7ef;
            transition: background 0.2s;
        }
        ul {
            margin: 0;
            padding-left: 18px;
        }
        li {
            margin-bottom: 2px;
        }
        .badge {
            display: inline-block;
            background: #eb2581;
            color: #fff;
            border-radius: 8px;
            padding: 2px 8px;
            font-size: 0.8em;
            font-weight: 300;
        }
        .desc {
            font-size: 0.97em;
            color: #334155;
            background: #f1f5f9;
            border-radius: 6px;
            padding: 6px 10px;
            margin-top: 2px;
        }
        @media (max-width: 600px) {
            .container { padding: 8px 2px; }
            th, td { padding: 6px 3px; font-size: 0.93em; }
            h1 { font-size: 1em; }
            .subtitle { font-size: 0.85em; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏡 Layanan Mandiri & Surat</h1>
        <div class="subtitle">BinaDesaGuest</div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama Jenis</th>
                    <th>Persyaratan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarSurat as $surat)
                <tr>
                    <td><span class="badge">{{ $surat['jenis_id'] }}</span></td>
                    <td><span class="badge">{{ $surat['kode'] }}</span></td>
                    <td>{{ $surat['nama_jenis'] }}</td>
                    <td>
                        <ul>
                            @foreach($surat['syarat_json'] as $syarat)
                                <li>{{ $syarat }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="desc">
                            {{ $surat['keterangan_tambahan'] }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
