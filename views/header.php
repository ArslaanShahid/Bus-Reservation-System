<?php
require_once 'init.php';
session_start();

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
    <link rel="shortcut icon" href="<?php echo(BASE_URL) ?>assets/images/logo/favicon.png" type="image/x-icon">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,600i,700" rel="stylesheet">
    <!--Bootstrap Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/bootstrap.min.css">

    <!--Owl Carousel Stylesheet-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo (BASE_URL); ?>assets/front/css/plugins/owl.carousel.min.html">
    <!--Slick Slider Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/plugins/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/plugins/slick.css">
    <!--Font Awesome Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/font-awesome.min.css">
    <!--Animate Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/plugins/animate.css">
    <link href="<?php echo (BASE_URL); ?>assets/admin/css/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo (BASE_URL); ?>assets/admin/css/sweetalert.css" rel="stylesheet">
    <link href="<?php echo (BASE_URL); ?>assets/css/select2.min.css" rel="stylesheet">
    <!--Main Stylesheet-->
    <link rel="stylesheet" href="<?php echo (BASE_URL); ?>assets/front/css/style60da.css?color=1a76cc">
    <!--Responsive Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/homePageResponsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/jquery.autocomplete.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/flatpickr.min.css">
    <link href="<?php echo (BASE_URL); ?>admin/assets/css/toastr.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo (BASE_URL); ?>assets/front/css/seat-custom.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css" />
        
    <style>
            /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    </style>
</head>




<!--Start Body Wrap-->
<div id="body-wrap">
    <div id="main-menu">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo(BASE_URL);?>index.php">
                    <img src="<?php echo(BASE_URL);?>assets/images/logo/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item">
                            <a class="nav-link active " href="<?php echo(BASE_URL)?>index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo(BASE_URL);?>about.php">About </a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo(BASE_URL);?>faqs.php">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo(BASE_URL)?>contact.php">Contact</a>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="<?php echo(BASE_URL) ?>ticket_cancel.php">Ticket Cancel</a>
                                <a class="dropdown-item" href="<?php echo(BASE_URL);?>print_download.php">Print Download</a>
                            </div>
                        </li>
                    </ul>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                 
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    

                    <!-- <a class="btn btn-primary" href="<?php echo(BASE_URL); ?>search.php">Buy
                        Ticket</a> -->


                    <?php
                    if (isset($_SESSION['obj_user'])) {
                        echo ("<a class='btn btn-primary ml-4 mr-4' href='".BASE_URL."process/process_logout.php'>Logout</a>");
                    } else {
                        echo ("<a class='btn btn-primary ml-4 mr-4' href='".BASE_URL."login.php'>Login</a>");
                    }

                    ?>

                    <?php
                    if (isset($_SESSION['obj_user'])) {
                        echo ("<a class='btn btn-primary' href='".BASE_URL."account.php'>My Account</a>");
                    } else {
                        echo ("<a class='btn btn-primary' href='".BASE_URL."register.php'>Sign up</a>");
                    }

                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>