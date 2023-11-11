@extends('base/landing_root')
@section('main')
    <main class="payment">
        <x-landing.hero page="Make Payment" />

        <section class="payment-section">
            <div class="controls">
                <button class="btn my-active">Book Visitation</button>
                <button class="btn">Book Accomodation</button>
                <button class="btn">Make Payment</button>
            </div>

            <div class="my-container form-fields">
                <form action="">
                    <h5 class="landing-section-title">Book a visitation</h5>

                    <div class="fields">
                        @foreach ($visitationForm as $field)
                            <x-generic.input :field=$field />
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-majesty">Book a Visitation</button>
                </form>
                <form action="">
                    <h5 class="landing-section-title">Book an Accomodation</h5>

                    <div class="fields">
                        @foreach ($accomodationForm as $field)
                            <x-generic.input :field=$field />
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-majesty">Book an Accomodation</button>
                </form>
                <form action="">
                    <h5 class="landing-section-title">Make a Payment</h5>

                    <div class="fields">
                        @foreach ($visitationForm as $field)
                            <x-generic.input :field=$field />
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-majesty">Make a Payment</button>
                </form>

            </div>

        </section>

        <x-landing.review />

    </main>
@endsection
