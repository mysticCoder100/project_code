@extends('base/base')
@section('script')
    <script src="{{ asset('/assets/script/admin.js') }}" defer></script>
@endsection
@section('body')

    <body data-role="admin" x-data="{ open_sidebar: false }" :class="open_sidebar && `lock`">
        <x-admin.adminSidebar />
        @yield('main')
        <x-admin.adminFooter />
    </body>
@endsection
