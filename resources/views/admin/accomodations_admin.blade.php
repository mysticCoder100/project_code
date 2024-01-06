@extends('base/admin_root')
@section('main')
    <x-admin.adminHeader page="accomodations" />
    <main class="admin-attractions">
        <x-admin.admin-attractions listName="accomodations" :$fields />
    </main>
@endsection
