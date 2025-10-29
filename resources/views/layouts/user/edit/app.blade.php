<!DOCTYPE html>
<html lang="id">
    {{-- START CSS --}}
@include('layouts.user.edit.css')
{{--END CSS --}}
<body>
{{-- START HEADER --}}
@include('layouts.user.edit.header')
{{-- END HEADER --}}

{{-- -START MAINCONTENT --}}
@yield('content')
{{-- END MAINCONTENT --}}
{{-- START FOOTER --}}
@include('layouts.user.edit.footer')
{{-- END FOOTER --}}
{{-- START SCRIPT --}}
@include('layouts.user.edit.script')
{{-- END SCRIPT --}}
</body>
</html>
