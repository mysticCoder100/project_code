<div class="top-info">
    <p>Hours: MON-SAT- 10am - 6pm, SUN - closed</p>
    <p> info@gmail.com | 09045324135 </p>
</div>
<header class="landing-header">
    <nav class="my-container">
        <div class="logo">
            <div class="logo-wrapper">
                <img src="{{ url('assets/images/logo.png') }}" alt="">
            </div>
            <button class="btn nav-toggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <div class="list-group">
            <a href="{{ url('/') }}" class="list-group-item {{ request()->is('/') ? 'my-active' : '' }}">
                Home
            </a>
            <a href="{{ url('/about') }}" class="list-group-item {{ request()->is('about') ? 'my-active' : '' }}">
                About
            </a>
            <a href="{{ url('/contact') }}" class="list-group-item {{ request()->is('contact') ? 'my-active' : '' }}">
                Contact
            </a>
            <a href="{{ url('/attractions') }}"
                class="list-group-item {{ request()->is('attractions') ? 'my-active' : '' }}">
                Attractions
            </a>
            <a href="{{ url('/accomodations') }}"
                class="list-group-item {{ request()->is('accomodations') ? 'my-active' : '' }}">Accomodations</a>
            <a href="{{ url('/payment') }}"
                class="list-group-item {{ request()->is('payment') ? 'my-active' : '' }}">Payment</a>
            @if (Auth::guard('tourist')->check())
                <a href="{{ url('/history') }}"
                    class="list-group-item {{ request()->is('history') ? 'my-active' : '' }}">My History</a>
            @else
                <button class="list-group-item" id="userFormToggler">Login</button>
            @endif
        </div>
    </nav>
</header>

<!-- Login Modal -->
<div class="modal fade" id="userFormModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/touristlogin" id="loginForm" method="POST">
                        @csrf
                        @foreach ($loginFields as $loginField)
                            <x-generic.input :field="$loginField" />
                        @endforeach
                        <div class="foot">
                            <button class="btn btn-majesty w-100" type="submit">Login</button>
                            <button class="btn register" type="button">
                                Don't have an Account ?? <span class="text-primary">Register Here</span>
                            </button>
                        </div>
                    </form>

                    <form action="/touristregister" method="POST" id="registerForm">
                        @csrf
                        @foreach ($registerFields as $registerField)
                            <x-generic.input :field="$registerField" />
                        @endforeach
                        <div class="foot">
                            <button class="btn btn-majesty w-100" type="submit">Register</button>
                            <button class="btn login" type="button">
                                Already have an Account ?? <span class="text-primary">Login Here</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
