<?php
require_once('models/user.php');
require_once('views/header.php');
?>

<body class="body-class bc blog">

    <!--Start Body Wrap-->
    <div id="body-wrap">


        <section id="breadcrumb">
            <div class="overly"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 text-center">
                        <div class="breadcrumbinfo">
                            <article>
                                <h2>Sign Up</h2>
                                <a href="index.html">Home</a> <span>/</span>
                                <a class="active" href="<?php echo(BASE_URL) ?>register.php">Sign Up</a>
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
            <div class="contact-form">

                <div class="container">
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
                    <div class="row contact-form-area">
                        <div class="col-lg-8 offset-2 contact-form">
                            <form id="c-form" action="<?php echo (BASE_URL); ?>process/process_signup.php" method="post">
                                <div class="row">
                                

                                
                                    <div class="col-md-12">
                                        <div class="margin-bottom-20"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Username</h5>
                                            <input type="text" value="" name="user_name" id="user_name" class="form-control checkUsername" placeholder="Username" autocomplete="off" />

                                            <span class="text-danger">
                                                <!-- @@ -->
                                                <?php
                                                if (isset($errors['user_name'])) {
                                                    echo ($errors['user_name']);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                              

                                    <div class="col-md-12">
                                        <div class="margin-bottom-20"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>E-mail Address</h5>
                                            <input type="text" value="" name="email" id="email" class="form-control checkUserEmail" placeholder="E-mail Address" autocomplete="off" />
                                            <span class="text-danger">
                                                <!-- @@@ -->
                                                <?php
                                                if (isset($errors['email'])) {
                                                    echo ($errors['email']);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="margin-bottom-20"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>CNIC</h5>
                                        <input type="" name="cnic" class="form-control" placeholder="Enter CNIC No XXXX-XXXXXXX-X " />
                                        <span class="text-danger">
                                                <!-- @@@ -->
                                                <?php
                                                if (isset($errors['cnic'])) {
                                                    echo ($errors['cnic']);
                                                }
                                                ?>
                                            </span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="margin-bottom-20"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>Password</h5>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                                        <span class="text-danger">
                                                <!-- @@@ -->
                                                <?php
                                                if (isset($errors['password'])) {
                                                    echo ($errors['password']);
                                                }
                                                ?>
                                            </span>
                                    </div>
                                                    

                                    <div class="col-md-12">
                                        <div class="margin-bottom-30"></div>
                                        <button type="submit" class="btn btn-contact btn-continue btn-block">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>

                                <div class="form-row margin-top-30">
                                    <div class="col-md-6">
                                        <span>Already Registered
                                            <a href="<?php echo (BASE_URL); ?>login.php" class="lostpass">Sign In</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


</body>

<?php

include('views/footer.php');
?>