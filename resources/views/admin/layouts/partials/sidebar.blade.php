<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

    <li
        class="nav-item has-treeview {{ Request::segment(1) === 'dashboard' || Request::segment(1) === 'admin-home' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link {{ Request::segment(1) === 'dashboard'  ? 'active' : null }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Overview
                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="" class="nav-link {{ Request::segment(1) === 'admin-home'  ? 'active' : null }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Home
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ Request::segment(1) === 'user'  ? 'active' : null }}">
                            <i class="far fa-arrow-circle-down nav-icon"></i>
                            <p>
                                User list
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link {{ Request::segment(1) === 'user'  ? 'active' : null }}">
                            <i class="far fa-arrow-circle-down nav-icon"></i>
                            <p>
                                User create
                            </p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </li>




</ul>
