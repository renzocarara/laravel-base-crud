<!DOCTYPE html>
<html lang="en" dir="ltr">

{{-- includo la sezione head --}}
@include ('partials.head')

<body>
    @include ('partials.header')

    {{-- qui verrà esteso il corpo della view --}}
    @yield('content')

    {{-- includo gli scripts --}}
    @include ('partials.scripts')

    {{-- includo il footer --}}
    @include ('partials.footer')

</body>

</html>