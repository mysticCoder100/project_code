@extends('base/admin_root')
@section('main')
    <x-admin.adminHeader page="attractions" />
    <main class="admin-attractions">
        <x-admin.admin-attractions listName="attractions" :$fields />
    </main>
@endsection
