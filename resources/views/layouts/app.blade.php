<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
    @include('partials.header')
    @yield('page')
    @include('partials.whatsapp')
    @include('partials.footer')
    @include('partials.script')
</body>
</html>