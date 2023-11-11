<footer class="landing-footer">
    <section class="footer-top my-container">
        <div class="landing-footer__divisionOne">
            <div class="img-wrapper">
                <img src="{{ url('assets/images/logo.png') }}" alt="" srcset="">
            </div>
        </div>
        <div class="landing-footer__division">
            <h5 class="my-3">Links</h5>
            <div class="list-group">
                <a href="#" class="list-group-item">About Us</a>
                <a href="#" class="list-group-item">Book Visitation</a>
                <a href="#" class="list-group-item">Our Gallery</a>
            </div>
        </div>
        <div class="landing-footer__division">
            <h5 class="my-3">Contact</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    09045324135
                </li>
                <li class="list-group-item">
                    <span class="badge"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    support@gmail.com
                </li>
                <li class="list-group-item">
                    <span class="badge"><i class="fas fa-location-dot" aria-hidden="true"></i></span>
                    The Federal University of Technology Akure, Km. 5 Ondo Ilesha Express Road, Akure, Ondo State.
                </li>
            </ul>
        </div>
    </section>
    <section class="footer-tail p-3">
        <p class="m-0 text-center">
            &copy;Copyright {{ (new DateTime())->format('Y') }} by Abdul-Azeem
        </p>
    </section>
</footer>
