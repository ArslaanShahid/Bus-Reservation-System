
<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar dropdown">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Manage Account</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>addadmin.php">
                            <i class="metismenu-icon fa fa-user "></i>
                            Add Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo(BASE_URL); ?>account.php">
                            <i class="metismenu-icon fa fa-list-ul   "></i>
                            View Account
                        </a>
                    </li>
                    <li>

                    </li>
                    <li class="app-sidebar__heading">Manage Users Account</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>view_registered_users.php">
                            <i class="metismenu-icon fa fa-users "></i>
                            Registered Account
                        </a>
                    </li>

                    <li>

                    </li>
                    <li class="app-sidebar__heading">Manage Employees</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>employee.php">
                            <i class="metismenu-icon fa fa-user-plus"></i>
                            Add Employee
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>employees_records.php">
                            <i class="metismenu-icon fa fa-user-circle"></i>
                            View Employee
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Manage Routes</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>add_route.php">
                            <i class="metismenu-icon fa fa-map-marker"></i>
                            Add Routes
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>view_routes.php">
                            <i class="metismenu-icon fa fa-random"></i>
                            View Routes
                        </a>
                    </li>

                    <li class="app-sidebar__heading">Manage Buses</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>bus.php">
                            <i class="metismenu-icon fa fa-bus"></i>
                            Add Bus
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>view_bus.php">
                            <i class="metismenu-icon fa fa-search"></i>
                            View Bus
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Manage Complaints</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>view_user_queries.php">
                            <i class="metismenu-icon fa fa-envelope"></i>
                            User Complaint
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Manage Booking</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>view_booking.php">
                            <i class="metismenu-icon fa fa-address-book-o"></i>
                            View Booking
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>cancel_booking.php">
                            <i class="metismenu-icon fa fa-exchange"></i>
                            Canceled Bookings
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Reports</li>
                    <li>
                        <a href="<?php echo(BASE_URL); ?>report.php">
                            <i class="metismenu-icon fa fa-list-alt"></i>
                            View Reports
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="app-main__outer">
        <div class="app-main__inner">
        