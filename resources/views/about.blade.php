@extends('base/landing_root')
@section('main')
    <main class="landing-about">
        <x-landing.hero />

        <x-landing.welcome heading="About the FUTA Wildlife Park" img="animal.jpg" flush="welcome-flush" />

        <section class="my-container the-team">
            <h3 class="landing-section-title">
                Meet the team
            </h3>
            <x-landing.team />
        </section>

        <x-landing.review />

    </main>
@endsection
