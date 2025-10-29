<!DOCTYPE html>
<html lang="en">
{{-- START CSS --}}
@include('layouts.permohonan.index.css')
{{-- END CSS --}}
<body class="about-page">

    {{-- ===  START HEADER=== --}}
    @include('layouts.permohonan.index.header')
{{-- -END HEADER --}}

    <main class="main">
{{-- -START MAIN CONTENT --}}
@yield('content')
{{-- -END MAIN CONTENT --}}

    {{-- === START FOOTER === --}}
@include('layouts.permohonan.index.footer')
    {{-- === END FOOTER === --}}

{{-- === START JS === --}}
@include('layouts.permohonan.index.script')
{{-- === END JS === --}}
</body>

</html>
