@extends('layouts.guest.app')
@section('content')
<div class="card p-4">
    <h4>{{ $berkas->nama_berkas }}</h4>

    <p>Valid: {{ $berkas->valid ? 'Ya' : 'Tidak' }}</p>

    <h5>Lampiran:</h5>

    @foreach ($berkas->media as $file)
        <div class="mb-3 border p-2">
            <b>{{ $file->file_name }}</b>
            <br>
            MIME: {{ $file->mime_type }}
            <br>

            @if(str_contains($file->mime_type, 'image'))
                <img src="{{ asset('storage/uploads/berkas/'.$file->file_name) }}" width="200">
            @else
                <a href="{{ asset('storage/uploads/berkas/'.$file->file_name) }}" target="_blank" class="btn btn-sm btn-secondary">
                    Buka File
                </a>
            @endif
        </div>
    @endforeach
</div>
@endsection
