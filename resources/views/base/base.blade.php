<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tourism Information System</title>

        <link rel="stylesheet" href="http://localhost:100/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost:100/fontawesome6/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/styles/css/main.css') }}">
        @yield('style')

        <script src=" http://localhost:100/jquery.js" defer></script>
        <script src="http://localhost:100/bootstrap.bundle.min.js" defer></script>
        <script src=" http://localhost:100/fontawesome6/js/all.min.js" defer></script>
        <script src=" http://localhost:100/alpine.js" defer></script>
        <script src=" http://localhost:100/chart.js" defer></script>
        <script src="{{ asset('assets/script/script.js') }}" defer></script>
        @yield('script')
    </head>

    @yield('body')

</html>
