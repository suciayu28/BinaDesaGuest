<!DOCTYPE html>
<html lang="id">
    {{-- START CSS --}}
@include('layouts.user.index.css')
{{-- END CSS --}}
<body>
{{-- START HEADER --}}
@include('layouts.user.index.header')
{{-- END HEADER --}}
{{-- START MAINCONTENT --}}
@yield('content')
{{--END MAINCONTENT --}}
{{-- START FOOTER --}}
@include('layouts.user.index.footer')
{{-- END FOOTER --}}
{{-- START SCRIPT --}}
@include('layouts.user.index.script')
{{-- END SCRIPT --}}
</body>
</html>
