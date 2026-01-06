<!DOCTYPE html>
<html lang="en">
<head>
    {{-- START CSS --}}
@include('layouts.guest.css')
    {{-- END CSS --}}
</head>

<body class="index-page">
    {{-- START HEADER --}}
@include('layouts.guest.header')
    {{-- END HEADER --}}

    {{-- START MAIN CONTENT --}}
@yield('content')
    {{-- END MAIN CONTENT --}}
@stack('scripts')
    {{-- START FOOTER --}}
@include('layouts.guest.footer')
    {{-- END FOOTER --}}

     {{-- START JAVASCRIPT --}}
    @include('layouts.guest.script')
    {{-- END JAVASCRIPT --}}
</body>

</html>
