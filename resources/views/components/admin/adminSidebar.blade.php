<aside class="admin-aside" :class="open_sidebar && `open`" @click="open_sidebar = false">
    <section class="sidebar" @click.stop>
        <div class="top">
            <div class="img-wrapper">
                <img src="{{ url('assets/images/logo.png') }}" alt="">
            </div>
            <h5 class="m-0">FUTA Park</h5>
        </div>
        <div class="main">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'my-active' : '' }}">
                        <span class="icon"><i class="fas fa-chart-pie"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-dropdown list-group-item {{ request()->routeIs('manage.*') ? 'open' : '' }}">
                    <button class="sidebar-dropdown_toggle nav-link">
                        <span>Manage Contents</span>
                        <span class="icon"><i class="fas fa-caret-down"></i></span>
                    </button>
                    <div class="sidebar-dropdown_menu">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('manage.attractions') }}"
                                    class="nav-link {{ request()->routeIs('manage.attractions') ? 'my-active' : '' }}">
                                    <span class="icon"><i class="far fa-map"></i></span>
                                    <span>Attractions</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <span class="icon"><i class="fas fa-bed"></i></span>
                                    <span>Accomodation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown list-group-item">
                    <button class="sidebar-dropdown_toggle nav-link">
                        <span>Payments</span>
                        <span class="icon"><i class="fas fa-caret-down"></i></span>
                    </button>
                    <div class="sidebar-dropdown_menu">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <span class="icon"><i class="fas fa-credit-card"></i></span>
                                    <span>Set Payment Options</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link">
                                    <span class="icon"><i class="fas fa-money-check-alt"></i></span>
                                    <span>Confirm Payments</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="list-group-item">
                    <a href="#" class="nav-link">
                        <span class="icon"><i class="fas fa-wrench"></i></span>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="foot">
            <div class="img-wrapper">
                <img src="{{ url('assets/images/default.png') }}" alt="">
            </div>
            <h6 class="usernam m-0 fw-bold ">Abdul-Azeem</h6>
        </div>
    </section>
</aside>
