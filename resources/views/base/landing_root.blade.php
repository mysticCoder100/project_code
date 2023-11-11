@extends('base/base')
@section('script')
    <script src="{{ asset('/assets/script/landing.js') }}" defer></script>
@endsection
@section('body')

    <body data-role="landing">
        <x-landing.landingHeader />
        @yield('main')
        <x-landing.landingFooter />
    </body>
@endsection
