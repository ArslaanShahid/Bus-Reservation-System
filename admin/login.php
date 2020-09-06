
<?php
session_start();
require_once('../models/Admin.php');

?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="assets/images/admin_logo.png" width="200px">
      <!-- <a href=""><b>Smart</b> BRS</a> -->
    </div>
    <h2 class="text-danger">
      <?php

      if(isset($_SESSION['msg'])){
        echo ($_SESSION['msg']);
        unset($_SESSION['msg']);
      }
      if(isset($_SESSION['errors'])){
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
      }


    ?>
    </h2>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to your Admin Panel</p>

        <form action="process/process_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="user_name"  class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <!-- <span class="fa fa-user-circle"></span> -->
              </div>
            </div>
            
          </div>
          <h6 class="text-danger">
              <span>
                <?php
                if(isset($errors['user_name'])){
                  echo($errors['user_name']);
                }

               ?>
              </span>
            </h6>
          <div class="input-group mb-3">
            <input type="password" name="password" value="" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <!-- <span class="fas fa-lock"></span> -->
              </div>
            </div>
          </div>
          <h6 class="text-danger">
              <span>
                <?php
                if(isset($errors['password'])){
                  echo($errors['password']);
                }


                ?>
              </span>
            </h6>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->
        <br>
        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p>
        <p class="mb-0">
          <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  
  <!-- <script src="assets/script/jquery.min.js"></script>
 
  <script src="assets/script/bootstrap.bundle.min.js"></script>
 
  <script src="assets/script/adminlte.min.js"></script>  -->

</body>

</html>