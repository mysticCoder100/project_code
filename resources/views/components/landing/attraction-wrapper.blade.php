<section class="my-container attractions_wrapper">
    @foreach ($attractions as $attraction)
        <div class="card border-0">
            <img class="card-img" src="{{ asset('assets/images/attractions/' . $attraction->attraction_image) }}"
                alt="Attraction_image">
            <div class="card-body">
                <h4 class="card-title">{{ $attraction->attraction_name }}</h4>
                <p class="card-text text-muted">{{ $attraction->attraction_description }}</p>
            </div>
        </div>
    @endforeach
</section>
