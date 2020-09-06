<?php
require_once 'models/user.php';
session_start();
if (isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $obj_user = new User();
}

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zxx">
<!--<![endif]-->


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>BRS</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,600i,700" rel="stylesheet">
    <!--Bootstrap Stylesheet-->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/bootstrap.min.css">

    <!--Owl Carousel Stylesheet-->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/plugins/owl.carousel.min.html">
    <!--Slick Slider Stylesheet-->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/plugins/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/assets/front/css/plugins/slick.css">
    <!--Font Awesome Stylesheet-->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/font-awesome.min.css">
    <!--Animate Stylesheet-->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/plugins/animate.css">
    <link href="assets/admin/css/toastr.min.css" rel="stylesheet" />
    <link href="assets/admin/css/sweetalert.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet">
    <!--Main Stylesheet-->
    <link rel="stylesheet" href="/assets/front/css/style60da.css?color=1a76cc">
    <!--Responsive Stylesheet-->
    <link rel="stylesheet" type="text/css" href="/assets/front/css/homePageResponsive.css">
    <link rel="stylesheet" type="text/css" href="/assets/front/css/jquery.autocomplete.css">
    <link rel="stylesheet" type="text/css" href="/assets/front/css/flatpickr.min.css">
    <link href="admin/assets/css/toastr.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/front/css/seat-custom.css">

</head>

<!-- <body class="body-class index-1"> -->

    <body class="body-class bc blog">


    <!--Start Body Wrap-->
    <div id="body-wrap">
        <div id="main-menu">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="/assets/images/logo/logo.png" alt="..">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link   active " href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="about-us.html">About </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link " href="blog.html">Blog</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link " href="faqs.html">Faq</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="contact-us.html">Contact</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle
                                                         " href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="#">Ticket Cancel</a>
                                    <a class="dropdown-item" href="#">Print Download</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle
                            " href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="https://booking.pak-lines.com/change-lang/en">English</a>
                                </div>
                            </li>
                        </ul>


                        <a class="mamunur_rashid_top_book_btn" href="https://booking.pak-lines.com/search">Buy Ticket</a>


                        <?php
                        if (isset($_SESSION['obj_user'])) {
                            echo ("<a class='mamunur_rashid_top_book_btn' href='process/process_logout.php'>Logout</a>");
                        } else {
                            echo ("<a class='mamunur_rashid_top_book_btn' href='login.php'>Login</a>");
                        }

                        ?>
                        <?php
                        if (isset($_SESSION['obj_user'])) {
                            echo ("<a class='mamunur_rashid_top_book_btn' href='my_account.php'>My Account</a>");
                        } else {
                            echo ("<a class='mamunur_rashid_top_book_btn' href='register.php'>Sign up</a>");
                        }

                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>