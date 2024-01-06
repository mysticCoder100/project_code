@extends('base/base')
@section('script')
    <script src="{{ asset('/assets/script/admin.js') }}" defer></script>
    <script src="{{ asset('assets/script/attraction.js') }}" type="module" defer></script>
    <script src="{{ asset('assets/script/accomodation.js') }}" type="module" defer></script>
    <script src="{{ asset('assets/script/administrators.js') }}" type="module" defer></script>
    <script src="{{ asset('assets/script/view-payment.js') }}" defer></script>
@endsection
@section('body')

    <body data-role="admin" x-data="{ open_sidebar: false }" :class="open_sidebar && `lock`">
        <x-admin.adminSidebar />
        @yield('main')
        <x-admin.adminFooter />
    </body>
@endsection
