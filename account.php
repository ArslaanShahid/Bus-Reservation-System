<?php
// session_start();
require_once('views/header.php');
if (isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $obj_user = new User();
}
$obj_user->profile();
?>

<body class="body-class bc blog">

    <section id="breadcrumb">
        <div class="overly"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <div class="breadcrumbinfo">
                        <article>
                            <h2>My Account</h2>
                            <a href="index.html">Home</a> <span>/</span>
                            <a class="active" href="login.html">My Account</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"> <?php
                                    if (isset($_SESSION['obj_user'])) {
                                        echo ("<h1 class='text-success text-center'>
                    Welcome Back! ");
                                        echo ($obj_user->user_name);
                                    }
                                    ?>
        </h4>

        <hr>
        <p class="mb-0">Here you can modify your profile - By Smart BRs</p>
    </div>

    <div class="card mt-5 mb-5" style="width: 20rem;">
        <div class="card-header fa fa-user-circle">
            Account Information
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item fa fa-user "><a href="my_account.php"> User Profile</a> </li>
            <li class="list-group-item fa fa-pencil-square-o "><a href="update_account.php"> Update Account</a> </li>
            <li class="list-group-item fa fa-history"><a href="booking_history.php"> Booking History</a> </li>
            <li class="list-group-item fa fa-envelope"><a href="#"> Complaint</a> </li>
        </ul>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php

    require_once('views/footer.php')

    ?>