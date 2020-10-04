<?php
session_start();
require_once '../models/Admin.php';
if (isset($_SESSION['obj_admin'])) {
  $obj_admin = unserialize($_SESSION['obj_admin']);
} else {
  $obj_admin = new Admin();
}
require_once 'init.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Smart BRs</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="icon" href="assets/images/favicon.png" sizes="16x16" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .login-box,
    .register-box {
      width: 450px;
      margin: 7% auto;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="assets/images/admin_logo.png" width="200px">
      <p style="font-size:20px;"></p>

      <!-- <a href=""><b>Smart</b> BRS</a> -->
    </div>
    <div class="login-box-body card-body text-danger text-center font-weight-bold">
      <?php
      if (isset($_SESSION['msg'])) {
        echo ($_SESSION['msg']);
        unset($_SESSION['msg']);
      }
      if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
      }
      ?>

    </div>
    <div class="login-box-body" style="height:350px;">
      <div class="card-body login-card-body">
        <p class="login-box-msg font-weight-bold">Sign in to your Admin Panel</p>
        <form action="<?php echo(BASE_URL); ?>process/process_login.php" method="post">
        
          <div class="input-group mb-3">
            <input type="text" name="user_name" class="form-control" placeholder="Username">
            <div class="input-group-append">

              <div class="input-group-text">
                <span class="fa fa-user"></span>
              </div>
              
            </div>

          </div>
          <span class="text-danger">
            <span>
              <?php
              if (isset($errors['user_name'])) {
                echo ($errors['user_name']);
              }
              ?>
            </span>
          </span>
          <div class="input-group mb-3">
            <input type="password" name="password" value="" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="metismenu-icon fa fa-lock"></i>
              </div>
            </div>
          </div>
          <h6 class="text-danger">
            <span>
              <?php
              if (isset($errors['password'])) {
                echo ($errors['password']);
              }


              ?></span>
          </h6>
          <div class="row">
            <div class="col-8 col">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>

              </div>
            </div>
            <!-- /.col -->
            <div class="input-group mb-4 icheck-primary">
            <input type="submit" class="btn btn-primary offset-5" value="Login">
              
            </div>
          </div>
           
        </form>
      <hr>
      <p class="mb-2 text-center">
        Copyright
        <i class="fa fa-copyright"> By Team Unity</i>
      </p>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  </div>


</body>
<script src="assets/scripts/jquery.min.js"></script>
<script src="assets/scripts/bootstrap.bundle.min.js"></script>
<script src="assets/scripts/adminlte.min.js"></script>
<script src="assets/scripts/toastr.min.js"></script>
<script>
  toastr.options.closeButton = true;
  toastr.options.preventDuplicate = true;
  toastr.options.progressBar = true;
  <?php
  if (isset($_SESSION['success'])) {
    echo ("toastr.success('" . $_SESSION['success'] . "')");
    unset($_SESSION['success']);
  }
  if (isset($_SESSION['error'])) {
    echo ("toastr.error('" . $_SESSION['error'] . "')");
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['info'])) {
    echo ("toastr.info('" . $_SESSION['info'] . "')");
    unset($_SESSION['info']);
  }
  ?>
</script>

</html>