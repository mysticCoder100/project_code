@extends('base/base')
@section('script')
    <script src="{{ asset('/assets/script/landing.js') }}" type="module" defer></script>
    <script src="{{ asset('/assets/script/touristsForm.js') }}" type="module" defer></script>
    <script src="{{ asset('assets/script/payment.js') }}" type="module" defer></script>
@endsection
@section('body')

    <body data-role="landing">
        <x-landing.landingHeader />
        @yield('main')
        <x-landing.landingFooter />
    </body>
@endsection
