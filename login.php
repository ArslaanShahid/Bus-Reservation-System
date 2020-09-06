<?php
// session_start();
require_once('models/user.php');
require_once('views/header.php');

?>
<section id="breadcrumb">
    <div class="overly"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center">
                <div class="breadcrumbinfo">
                    <article>
                        <h2>Sign In</h2>
                        <a href="index.html">Home</a> <span>/</span>
                        <a class="active" href="login.html">Sign In</a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>


<!--================================
        contact us  part start
    =====================================-->
<section id="contact-main">
    <div class="row offset-3">
        <h2 class="text-danger">
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

        </h2>

    </div>
    <div class="contact-form">
        <div class="container">
            <div class="row contact-form-area">
                <h3 class="text-danger">

                </h3>
                <div class="col-lg-8 offset-2 contact-form">
                    <form id="c-form" action="/process/process_login.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Username</h5>
                                    <input type="text" name="user_name" value="" class="form-control" placeholder="Enter Username">
                                    <h6 class="text-danger">
                                        <span>
                                            <?php
                                            if (isset($errors['user_name'])) {
                                                echo ($errors['user_name']);
                                            }

                                            ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5>Password</h5>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                <h6 class="text-danger">
                                    <span>
                                        <?php
                                        if (isset($errors['password'])) {
                                            echo ($errors['password']);
                                        }
                                        ?>
                                    </span>
                                </h6>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-contact btn-block">Sign In</button>
                            </div>
                        </div>



                        <div class="form-row  margin-top-30">
                            <div class="col-md-6">
                                <a href="password/reset.html" class="lostpass">Forgot Password</a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="register.php" class="loginwith">Create an Account</a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!--================================
        contact us part end
    =====================================-->
<?php
require_once('views/footer.php');
?>