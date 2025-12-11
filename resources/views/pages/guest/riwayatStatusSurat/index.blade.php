@extends('layouts.guest.app')

@section('content')
<div class="container">
    <h3>Riwayat Status Surat</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Riwayat ID</th>
                <th>Permohonan ID</th>
                <th>Status</th>
                <th>Petugas</th>
                <th>Waktu</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayats as $r)
            <tr>
                <td>{{ $r->riwayat_id }}</td>
                <td>{{ $r->permohonan_id }}</td>
                <td>{{ $r->status }}</td>
                <td>{{ $r->petugas->nama ?? '-' }}</td>
                <td>{{ $r->waktu->format('d-m-Y H:i') }}</td>
                <td>{{ $r->keterangan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada riwayat</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
