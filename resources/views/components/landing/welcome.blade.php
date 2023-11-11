@props([
    'heading' => ' Welcome to the FUTA wildlife park',
    'img' => 'showcase.jpg',
    'flush' => '',
])

<section class="my-container welcome {{ $flush }}">
    <div class="welcome__img-space">
        <div class="welcome__img">
            <img src="{{ asset('/assets/images/' . $img) }}" alt="" srcset="">
        </div>
    </div>
    <div class="welcome__content">
        <h3 class="landing-section-title">
            {{ $heading }}
        </h3>

        <p class="memo">
            Help us to protect the wildlife around us
        </p>

        <p class="text-muted">
            There are many variations of passages of available but the majority have suffered alteration in some
            form, by injected humou or randomised words even slightly believable.
        </p>

        <ul class="list-group list-group-flush info-list">
            <li class="list-group-item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </li>
            <li class="list-group-item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </li>
            <li class="list-group-item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </li>
        </ul>
        <a href="#"class="btn btn-fresh">Discover More </a>
    </div>
</section>
