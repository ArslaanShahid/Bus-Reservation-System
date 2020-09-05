<?php
require_once 'views/header.php';
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<body class="body-class index-1">
<div id="body-wrap">
<h1 class="text-center">Password Update</h1>
<br>
<br>
<br>
<!-- <div class="row"> -->
        <section id="form">
            <!--form-->
            <div class="container">
                <div class="col-md-offset-4">
                    <div class="signup-form form-group col-md-9  offset-3">
                        <!--sign up form-->
                        <h2 class="text-danger">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo ($_SESSION['msg']);
                                unset($_SESSION['msg']);
                            }
                            if (isset($_SESSION['errors'])) {
                                $errors = $_SESSION['errors'];
                                //                                print_r($errors);
                                unset($_SESSION['errors']);
                            }
                            ?>
                        </h2>
                        <form action="process/process_change_password.php" method="post">
                            <div class="form-group col-md-8">
                                <label for="password">Old Password:</label>
                                <input type="password" name="old_password" id="old_password" class="password form-control" placeholder="Old Password ">
                                <span class="password text-danger">
                                    <?php
                                    if (isset($errors['old_password'])) {
                                        echo ($errors['old_password']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="password">New Password:</label>
                                <input type="password" name="new_password" id="new_password" class="password form-control" placeholder="New Password ">
                                <span class="password text-danger">
                                    <?php
                                    if (isset($errors['new_password'])) {
                                        echo ($errors['new_password']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="password">Confirm Password:</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="password form-control" placeholder="Confirm Password ">
                                <span class="password text-danger">
                                    <?php
                                    if (isset($errors['confirm_password'])) {
                                        echo ($errors['confirm_password']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group col-md-2 col-md-offset-3">
                                <input type="submit" value="Change" class="btn-primary">
                            </div>

                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </section>
    </div>
    
</body>


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
        require_once 'views/footer.php'
        ?>