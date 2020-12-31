<ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <span><b>{{ auth()->user()->name }}</b> &nbsp;</span><i class="fas fa-arrow-circle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a class="dropdown-item" href="">Profile</a>
            <a class="dropdown-item" href="">Change Password</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </li>
</ul>