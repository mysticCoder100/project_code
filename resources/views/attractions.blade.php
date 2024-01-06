@extends('base/landing_root')
@section('main')
    <main class="landing-attractions">
        <x-landing.hero page="Attractions" />

        <x-landing.attraction-wrapper />

        <x-landing.review />

    </main>
@endsection
