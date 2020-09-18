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


       <div class="card" style="width: 18rem;">
  <div class="card-header">
    Account 
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item fa fa-user "> My Account</li>
    <li class="list-group-item fa fa-address-book"> Booking History</li>
    <li class="list-group-item fa fa-envelope"> Complaint</li>
  </ul>
</div>
    

<?php

require_once('views/footer.php')

?>

