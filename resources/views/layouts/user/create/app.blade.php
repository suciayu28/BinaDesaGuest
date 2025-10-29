<!DOCTYPE html>
<html lang="id">
    {{-- START CSS --}}
@include('layouts.user.create.css')
{{-- END CSS --}}
<body>
{{-- START HEADER --}}
@include('layouts.user.create.header')
{{-- END HEADER --}}
{{-- START CONTENT --}}
@yield('content')
{{-- END CONTENT --}}
{{-- START FOOTER --}}
@include('layouts.user.create.footer')
{{-- END FOOTER --}}
{{-- START SCRIPT --}}
@include('layouts.user.create.script')
{{-- END SCRIPT --}}
</body>
</html>
