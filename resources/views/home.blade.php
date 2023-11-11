@extends('base/landing_root')
@section('main')
    <main class="landing-home">

        <section class="slider">
            <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#heroSlider"data-bs-slide-to="0" aria-current="true" aria-label="First slide"></li>
                    <li data-bs-target="#heroSlider"data-bs-slide-to="1" class="active" aria-label="Second slide"></li>
                    <li data-bs-target="#heroSlider"data-bs-slide-to="2" aria-label="Third slide"></li>
                </ol>
                <div class="carousel-inner"role="listbox">
                    <div class="carousel-item">
                        <img src="{{ asset('/assets/images/animal.jpg') }}"class="" alt="First slide">
                        <div class="my-carousel-caption">
                            <div class="inner">
                                <p>Explore Our Animals</p>
                                <h3>New Wildlife Experience of Joy</h3>
                                <a href="#"class="btn btn-fresh">Discover More </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ asset('/assets/images/elephant.jpg') }}"class="" alt="Second slide">
                        <div class="my-carousel-caption">
                            <div class="inner">
                                <p>Explore Our Animals</p>
                                <h3>New Wildlife Experience of Joy</h3>
                                <a href="#"class="btn btn-fresh">Discover More </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/assets/images/mammals.jpg') }}"class="" alt="Third slide">
                        <div class="my-carousel-caption">
                            <div class="inner">
                                <p>Explore Our Animals</p>
                                <h3>New Wildlife Experience of Joy</h3>
                                <a href="#"class="btn btn-fresh">Discover More </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev"type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next"type="button" data-bs-target="#heroSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon"aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <x-landing.welcome />

        <section class="my-container why-choose-us">
            <div class="img">
                <img src="{{ asset('/assets/images/chooseus-bg.jpg') }}" alt="" srcset="">
            </div>
            <div class="why-choose-us__content">
                <h3 class="landing-section-title">
                    Why you should choose FUTA wildlife park
                </h3>
                <div class="why-choose-us__content-main">
                    <p class="text">
                        There are many variations of passages of but the majority have alteration in some form by
                        injected humour or which don't look even slightly believe.
                    </p>

                    <ul class="list-group list-group-flush info-list">
                        <li class="list-group-item">
                            Making this first true generator
                        </li>
                        <li class="list-group-item">
                            Many desktop publish packages
                        </li>
                        <li class="list-group-item">
                            Lorem, ipsum dolor sit amet consectetur adipisicing.
                        </li>
                        <li class="list-group-item">
                            If you are going to passage
                        </li>
                        <li class="list-group-item">
                            It has roots in a piece
                        </li>
                    </ul>
                </div>
            </div>
            <div class="why-choose-us__aside">
                <div class="card">
                    <div class="card-body text-white">

                    </div>
                </div>
            </div>

        </section>

        <x-landing.review />

    </main>
@endsection
