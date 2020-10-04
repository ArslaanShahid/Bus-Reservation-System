<?php
session_start();
require_once '../models/Admin.php';

define('BASE_FOLDER','/admin/');
define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].BASE_FOLDER);

if (isset($_SESSION['obj_admin'])) {
    $obj_admin = unserialize($_SESSION['obj_admin']);

} else {
    $obj_admin = new Admin();
}

$public_pages = [
    BASE_FOLDER."login.php",
];
$restricted_pages = [
    BASE_FOLDER."account.php",
    BASE_FOLDER."add_route",
    BASE_FOLDER."view_bus.php",
    BASE_FOLDER."view_routes.php",
    BASE_FOLDER."view_user_queries.php",
    BASE_FOLDER."bus.php",
    BASE_FOLDER."update_account.php",
    BASE_FOLDER."view_registered_users.php",
    BASE_FOLDER."addadmin.php",
    BASE_FOLDER."employee.php",
    BASE_FOLDER."employee_records.php",
    BASE_FOLDER."view_booking.php",

];
$current = $_SERVER['PHP_SELF'];

if(in_array($current,$restricted_pages) && !$obj_admin->loggedin) {
    $_SESSION['error'] = "Please Login To View This Page";
    header("Location:".BASE_URL."login.php");
    die;
}
if(in_array($current,$public_pages) && $obj_admin->loggedin) {
    $_SESSION['error'] = "Please Logout to View This Page";
    header("Location:".BASE_URL."index.php");
    die;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bus Reservation System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo(BASE_URL); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo(BASE_URL); ?>assets/css/toastr.min.css">
    <link href="<?php echo(BASE_URL); ?>../assets/css/select2.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/b-1.6.4/b-print-1.6.4/fh-3.1.7/datatables.min.css"/>
      <link rel="icon" href="<?php echo(BASE_URL); ?>assets/images/favicon.png" sizes="16x16" type="image/png">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="navbar-brand"><a href="index.php"><img src="assets/images/admin_logo.png" width="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;</div>
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
            <div class="app-header__content">

                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/11.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User
                                                Account</button>
                                            <?php
                                            if (isset($_SESSION['obj_admin'])) {
                                                echo ("<a href='".BASE_URL."process/process_logout.php' button type='button' tabindex='0' class='dropdown-item'>Logout</a>");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php
                                        if (isset($_SESSION['obj_admin'])) {
                                            echo ucfirst($obj_admin->user_name);
                                        }
                                        ?>
                                    </div>
                                    <div class="widget-subheading">
                                        Developer
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>