@extends('base/admin_root')
@section('main')
    <x-admin.adminHeader page="administrators" />
    <main class="admin-attractions">
        <x-admin.admin-attractions listName="administrators" :$fields />
    </main>
@endsection
