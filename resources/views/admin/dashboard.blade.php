@extends('base/admin_root')
@section('main')
    <x-admin.adminHeader />
    <main class="admin-dashboard">
        <section class="my-container-admin">
            <x-admin.dashboard-cards />
        </section>
        <section class="my-container-admin chart">
            <div class="visition-monitor">
                <h4>Visitation Monitor</h4>
                <canvas id="visitationMonitor"></canvas>
            </div>
            <div class="visition-range">
                <h4>Visitation based on the usage of guest house</h4>
                <canvas id="visitationRange"></canvas>
            </div>
        </section>
    </main>
@endsection
