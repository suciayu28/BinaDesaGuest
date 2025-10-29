<!DOCTYPE html>
<html lang="en">
<head>
    {{-- START CSS --}}
@include('layouts.dashboard.css')
    {{-- END CSS --}}
</head>

<body class="index-page">
    {{-- START HEADER --}}
@include('layouts.dashboard.header')
    {{-- END HEADER --}}

    {{-- START MAIN CONTENT --}}
@yield('content')
    {{-- END MAIN CONTENT --}}

    {{-- START FOOTER --}}
@include('layouts.dashboard.footer')
    {{-- END FOOTER --}}

     {{-- START JAVASCRIPT --}}
    @include('layouts.dashboard.script')
    {{-- END JAVASCRIPT --}}
</body>

</html>
