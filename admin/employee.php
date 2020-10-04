<?php
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon fa fa-user-plus">
                </i>
            </div>
            <div>Manage Employee
                <div class="page-title-subheading">Add Employee
                </div>
            </div>
        </div>

    </div>
</div>
<div class="main-card col-md-6 mb-2 card offset-3 ">
    <div class="card-body">
        <h5 class="card-title">Add Employee</h6>
            <h5 class="text-danger">
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

            </h5>
            <form method="POST" action="<?php echo(BASE_URL); ?>process/process_add_employee.php">
                <div class="form-row">

                    <div class="col-md-7 mb-3">
                        <label for="validationCustomUsername">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>

                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" aria-describedby="inputGroupPrepend">



                        </div>
                        <span class="text-danger">
                    <?php
                    if (isset($errors['name'])) {
                        echo ($errors['name']);
                    }
                    ?>
                    </span>

                    </div>
                   
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="Gender">Gender</label><br>
                        <input type="radio" name="gender[]" value="male">Male &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender[]" value="female">Female
                        <br>
                        <span class="text-danger">
    
                        <?php
                        if (isset($errors['gender'])) {
                            echo ($errors['gender']);
                        }
                        ?>
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="Mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No">

                        <span class="text-danger">
    
                        <?php
                        if (isset($errors['mobile_no'])) {
                            echo ($errors['mobile_no']);
                        }
                        ?>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">

                        <span class="text-danger">
    
                        <?php
                        if (isset($errors['address'])) {
                            echo ($errors['address']);
                        }
                        ?>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="Job">Job Type</label>
                        <select class="form-control" id="type" name="type">
                            <option selected disabled>--Select Type--</option>
                            <option value="driver">Driver</option>
                            <option value="staff">Staff</option>
                            <option value="other">Other</option>

                        </select>
                        <span class="text-danger">
    
                        <?php
                        if (isset($errors['type'])) {
                            echo ($errors['type']);
                        }
                        ?>
                        </span>
                    </div>

                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="Salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Salary">

                        <span class="text-danger">
    
                        <?php
                        if (isset($errors['salary'])) {
                            echo ($errors['salary']);
                        }
                        ?>
                        </span>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Add Employee</button>
            </form>
    </div>
</div>
<?php
require_once 'views/footer.php';
?>