<section class="my-container attractions_wrapper">
    @foreach ($accomodations as $accomodation)
        <div class="card border-0">
            <img class="card-img" src="{{ asset('assets/images/accomodations/' . $accomodation->accomodation_image) }}"
                alt="Attraction_image">
            <div class="card-body">
                <h4 class="card-title">{{ $accomodation->accomodation_name }}</h4>
                <p class="card-text text-muted">{{ $accomodation->accomodation_description }}</p>
                <p class="card-text price">
                    ₦{{ number_format($accomodation->accomodation_price, 2, '.', ',') }} (per night)
                </p>
            </div>
        </div>
    @endforeach
</section>
