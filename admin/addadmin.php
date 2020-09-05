<?php
require_once 'models/Admin.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>


<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-user">
                        </i>
                    </div>
                    <div>Manage Account
                        <div class="page-title-subheading">Add Admin
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="main-card col-md-6 mb-2 card offset-3 ">
            <div class="card-body">
                <h5 class="card-title">Add Admin Account</h6>
                    <h5 class="text-danger">

                    </h5>
                    <form method="POST" action="process/process_addadmin.php">
                        <div class="form-row">

                            <div class="col-md-7 mb-3">
                                <label for="validationCustomUsername">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>

                                    <input type="text" class="form-control" name="user_name" id="user_name"
                                        placeholder="Username" aria-describedby="inputGroupPrepend">



                                </div>
                                <div class="text-danger">

                                    <?php
                                    if (isset($errors['user_name'])) {
                                        echo ($errors['user_name']);
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7 mb-3">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['email'])) {
                                        echo ($errors['email']);
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-7 mb-3">
                                <label for="validationCustom03">Password</label>
                                <input type="Password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['password'])) {
                                        echo ($errors['password']);
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Add Admin</button>
                    </form>
            </div>
        </div>
        <?php
        include('views/footer.php');
        ?>