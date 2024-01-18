@extends('base/admin_root')
@section('main')
    <x-admin.adminHeader page="Profile" />
    <main class="my-container-admin profile-main">
        <section>
            <div class="list-group shadow-lg">
                <p class="list-group-item list-group-item-action">
                    <span>FirstName: </span>
                    <span>{{ Auth::guard('administrator')->user()->firstname }}</span>
                </p>
                <p class="list-group-item list-group-item-action">
                    <span>LastName: </span>
                    <span>{{ Auth::guard('administrator')->user()->lastname }}</span>
                </p>
                <p class="list-group-item list-group-item-action">
                    <span>Email: </span>
                    <span>{{ Auth::guard('administrator')->user()->email }}</span>
                </p>
            </div>
        </section>
    </main>
@endsection
