@props([
    'page' => 'Dashboard',
])

<header class="admin-header">
    <div class="left">
        <button class="btn sidebar-toggle" @click="open_sidebar = true">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <h4 class="text-capitalize text-muted">{{ $page }}</h4>
    </div>

    <div class="right">
        <div class="btn-group">
            <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown">
                <div class="img-wrapper">
                    <img src="{{ url('assets/images/default.png') }}" alt="" class="user-img">
                </div>
            </button>
            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">
                    <span class="icon"><i class="fas fa-id-badge"></i> </span>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <span class="icon"><i class="fas fa-cash-register"></i> </span>
                    Reset Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <span class="icon text-danger"><i class="fas fa-sign-out-alt"></i> </span>
                    Sign Out
                </a>
            </div>
        </div>
    </div>
</header>
