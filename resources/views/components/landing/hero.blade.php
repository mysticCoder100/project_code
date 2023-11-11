@props([
    'page' => 'About Us',
])
<section class="hero">
    <div class="img">
        <img src="{{ asset('/assets/images/mammals.jpg') }}" alt="">
    </div>
    <div class="my-container hero__content">
        <h4 class="landing-section-title m-0">
            {{ $page }}
        </h4>
    </div>
</section>
