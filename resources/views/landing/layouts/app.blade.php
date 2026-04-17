<!DOCTYPE html>
<html lang="en">

@include('landing.layouts.head')

<body>
    @include('landing.layouts.spinner')

    @include('landing.layouts.navbar')

    @yield('content')

    @include('landing.layouts.footer')

    @include('landing.layouts.scripts')
</body>

</html>