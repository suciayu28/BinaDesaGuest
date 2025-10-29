<!DOCTYPE html>
<html lang="en">

<head>
    {{-- ========================== START CSS ========================== --}}
    @include('layouts.jenis_surat.css')
    {{-- ========================== END CSS ========================== --}}
<body class="about-page">

    {{-- ========================== START HEADER ========================== --}}
@include('layouts.jenis_surat.header')
    {{-- ========================== END HEADER ========================== --}}

    {{-- ========================== START MAIN CONTENT ========================== --}}
@yield('content')
    {{-- ========================== END MAIN CONTENT ========================== --}}

    {{-- ========================== START FOOTER ========================== --}}
@include('layouts.jenis_surat.footer')
    {{-- ========================== END FOOTER ========================== --}}

    {{-- ========================== START JAVASCRIPT ========================== --}}
@include('layouts.jenis_surat.script')
    {{-- ========================== END JAVASCRIPT ========================== --}}
</body>

</html>
