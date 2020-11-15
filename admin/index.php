<?php
require_once('../models/Admin.php');
require_once('views/header.php');
require_once('views/layoutoption.php');
require_once('views/sidebar.php');
require_once('../models/Queries.php');
require_once('../models/Employee.php');
require_once('../models/Bus.php');
require_once('../models/user.php');
require_once('../models/Route.php');
require_once('../models/Booking.php');

// $result= Booking::weekly_Earning();
// echo("<pre>");
//     print_r($result);
//     die;
//     echo ("</pre>");


?> 
                                                            



<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon fa fa-bus">
                </i>
            </div>
            <div>Admin Dashboard
                <div class="page-title-subheading">Smart Bus Reservation System
                </div>
            </div>
        </div>

    </div>
</div>


<div class="row">
    
    <div class="col-md-6 col-xl-4">
    <a class="text-white" href="view_user_queries.php">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Complaint</div>
                    <div class="widget-subheading"></div>
                    <i class="fa fa-commenting fa-2x"></i>

                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            echo Queries::count_complaint(); ?>
                        </span></div>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
            <a class="text-white" href="view_user_queries.php">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Employees</div>
                    <div class="widget-subheading"></div>
                    <i class="fa fa-user-circle-o fa-2x"></i>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            echo Employee::count_employees(); ?>

                        </span></div>
                </div>
            </div>
        </div>
    </div>
</a>
    <div class="col-lg-6 col-xl-4">
    <a class="text-white" href="account.php">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Admins</div>
                    <i class="fa fa-user fa-2x"></i>

                    <div class="widget-subheading"></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span> <?php
                     echo Admin::count_admin(); ?></span></div>
                </div>
            </div>
        </div>
    </div>
</a>
    <div class="col-lg-6 col-xl-4">
    <a class="text-white" href="view_bus.php">
        <div class="card mb-3 widget-content bg-happy-green">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Buses</div>
                    <i class="fa fa-bus fa-2x"></i>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-dark"><span>

                            <?php echo Bus::count_bus(); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <div class="col-lg-6 col-xl-4">
    <a class="text-white" href="view_bus.php">
        <div class="card mb-3 widget-content bg-night-fade">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Registered User</div>
                    <i class="fa fa-users fa-2x"></i>

                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php echo user::count_use_reg(); ?>
                        </span></div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <div class="col-lg-6 col-xl-4">
    <a class="text-dark" href="view_routes.php">
        <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Routes</div>
                    <i class="fa fa-map-marker fa-2x"></i>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-success"><span>

                            <?php
                            echo Route::count_routes(); ?>
                        </span></div>
                </div>
            </div>
        </div>
    </div>
</div>
</a>

<div class="divider mt-0" style="margin-bottom: 30px;"></div>
                            <div class="main-card mb-3 card">
                                <div class="no-gutters row">
                                    <div class="col-md-4">
                                        <div class="widget-content">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-right ml-0 mr-3">
                                                    <div class="widget-numbers text-info">
                                                    <?php echo Booking::count_booked(); ?> 
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Ticket</div>
                                                    <i class="fa fa-ticket fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-content">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-right ml-0 mr-3">
                                                    <div class="widget-numbers text-success">
                                                    <?php echo Booking::count_Bookings(); ?>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Booked Ticket</div>
                                                    <i class="fa fa-check-square-o fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-content">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-right ml-0 mr-3">
                                                    <div class="widget-numbers text-danger">
                                                    <?php echo Booking::count_CancelBookings(); ?>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Disputed Ticket</div>
                                                    <i class="fa fa-repeat fa-2x"></i>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <br>
                                                        <div class="widget-heading">Daily Earning</div>
                                                        <i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>

                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-success">
                                                            <?php echo("<span class=''>PKR </span>"). Booking::Daily_Earning() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <br>
                                                        <div class="widget-heading">Weekly Earning</div>
                                                        <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-warning">

                                                        <?php 
                                                          echo ("<span class=''>PKR </span>"). Booking::weekly_Earning();
                                                            
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <br>
                                                        <div class="widget-heading">Total Earning</div>
                                                        <div class="widget-subheading"></div>
                                                        <i class="fa fa-money fa-2x"></i>

                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-info">
                                                        <?php 
                                                            echo ("<span class=''>PKR </span>"). Booking::AllTime_Earning();
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


<!-- <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Followers</div>
                                <div class="widget-subheading">People Interested</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-danger">45,9%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Income</div>
                                <div class="widget-subheading">Expected totals</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-focus">$147</div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                            </div>
                            <div class="progress-sub-label">
                                <div class="sub-label-left">Expenses</div>
                                <div class="sub-label-right">100%</div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div> -->

<?php
include('views/footer.php');
?>