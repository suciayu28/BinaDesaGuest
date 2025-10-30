<!DOCTYPE html>
<html lang="id">
{{-- START HEADER --}}
@include('layouts.login.header')
{{-- END HEADER --}}
<body class="bg-light">
{{-- START MAIN CONTENT --}}
@yield('content')
{{-- END MAIN CONTENT --}}
{{-- START SCRIPT --}}
@include('layouts.login.script')
{{-- END SCRIPT --}}
</body>
</html>
