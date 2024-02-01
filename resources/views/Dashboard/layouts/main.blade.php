<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    @include('Dashboard.partials.head')
  </head>
<body>
@include('Dashboard.partials.icon')
@include('Dashboard.partials.header')
@include('Dashboard.partials.sidebar')
@yield('page')
 
@include('Dashboard.partials.script')
</body>
</html>
