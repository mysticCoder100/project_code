<section class="my-container review">

    <h3 class="landing-section-title m-auto">
        What People Say
    </h3>

    <div class="landing-review">
        @foreach ($reviews as $review)
            <div class="card">
                <img class="card-img-top" src="{{ asset('/assets/images/default.png') }}" alt="Title">
                <div class="card-body">
                    <p class="info text-muted">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, reiciendis deserunt quis
                        dolorum
                        minus consequuntur inventore molestiae hic adipisci incidunt.
                    </p>
                    <div class="dropdown-divider"></div>
                    <p class="user user-block">
                        <span>Jude Tonny</span>
                        <span class="position">Customer</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>


</section>
