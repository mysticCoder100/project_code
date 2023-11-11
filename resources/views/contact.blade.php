@extends('base/landing_root')
@section('main')
    <main class="contact">
        <x-landing.hero page="Contact Us" />

        <section class="my-container map-container">
            <h3 class="landing-section-title">
                Our Location
            </h3>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15830.03428799146!2d5.1433290000000005!3d7.296613999999999!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1699033545322!5m2!1sen!2sus"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <section class="my-container contact-form">
            <h3 class="landing-section-title">
                Have a Question Drop a line
            </h3>
            <form action="">
                <div class="input">
                    @foreach ($fields as $field)
                        <x-generic.input :$field />
                    @endforeach
                </div>
                @foreach ($textareas as $textarea)
                    <x-generic.input :field="$textarea" />
                @endforeach
                <button class="btn btn-majesty" type="submit">
                    Submit a Comment
                </button>
            </form>
        </section>

        <x-landing.review />

    </main>
@endsection
