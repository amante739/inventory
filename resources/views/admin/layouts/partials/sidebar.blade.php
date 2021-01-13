<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/home')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Overview
                    </p>
                </a>

            </li>
        </ul>
    </li>


    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Product In
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('productIn')}}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        In
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('productInView') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        View
                    </p>
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Product Out
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('productOut')}}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Out
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('productOutView') }}"
                    class="nav-link {{ Request::segment(1) === 'user'  ? 'active' : null }}">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        View
                    </p>
                </a>
            </li>
        </ul>
    </li>


    <li
        class="nav-item has-treeview {{ Request::segment(1) === 'dashboard' || Request::segment(1) === 'admin-home' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Product Requisition
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('requisitions.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        New Requisition
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('requisitions.create') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        View Requisition
                    </p>
                </a>
            </li>
        </ul>
    </li>


    <li
        class="nav-item has-treeview {{ Request::segment(1) === 'dashboard' || Request::segment(1) === 'admin-home' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Damage/Return
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('damages.create') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Adjustment
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('damages.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        View Adjustment
                    </p>
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Opening stock
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('stocks.create') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Add Opening
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('stocks.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        View Opening
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Settings
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('items.create') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Add Multiple Item
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('items.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Items
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Item Category
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('locations.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Location
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('units.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Units
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('suppliers.index') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Supplier
                    </p>
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Report
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('item-date-report') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Item Wise Report
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('daily-summary-report') }}" class="nav-link">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Summary Report
                    </p>
                </a>
            </li>
        </ul>
    </li>


    <li
        class="nav-item has-treeview {{ Request::segment(1) === 'dashboard' || Request::segment(1) === 'admin-home' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                User Management
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                    class="nav-link {{ Request::segment(1) === 'user'  ? 'active' : null }}">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        Add User
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.create') }}"
                    class="nav-link {{ Request::segment(1) === 'user'  ? 'active' : null }}">
                    <i class="far fa-arrow-circle-down nav-icon"></i>
                    <p>
                        View User
                    </p>
                </a>
            </li>
        </ul>
    </li>


</ul>