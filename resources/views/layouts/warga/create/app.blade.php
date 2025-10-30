<!DOCTYPE html>
<html lang="id">
{{-- START CSS --}}
@include('layouts.warga.create.css')
{{-- END CSS --}}
<body>
{{-- START HEADER --}}
@include('layouts.warga.create.header')
{{-- END HEADER --}}
{{-- START MAIN CONTENT --}}
@yield('content')
{{-- ED MAIN CONTENT --}}
{{-- START FOOTER --}}
@include('layouts.warga.create.footer')
{{-- END FOOTER --}}
{{-- START SCRIPT --}}
@include('layouts.warga.create.script')
{{-- END SCRIPT --}}
</body>
</html>
