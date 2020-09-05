<?php
require_once 'views/header.php';

require_once 'views/sidebar.php';
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-bus">
                        </i>
                    </div>
                    <div>Manage Bus
                        <div class="page-title-subheading">Add Bus
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        ?>
        <div class="main-card col-md-6 mb-2 card offset-3 ">
            <div class="card-body">
                <h5 class="card-title">Add Bus</h6>
                    <h5 class="text-danger">

                    </h5>
                    <form method="POST" action="process/process_add_bus.php">
                        <div class="form-row">

                            <div class="col-md-7 mb-3">
                                <label for="validationCustomUsername">Bus Number:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" class="form-control" name="bus_no" id="bus_no" placeholder="Enter Bus No">
                                </div>
                                <span class="text-danger">
                                    <?php
                                    if (isset($errors['bus_no'])) {
                                        echo ($errors['bus_no']);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7 mb-3">
                                <label for="">Bus Type:</label><br>
                                <input type="radio" name="air_conditioner[]" value="1">AC &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="air_conditioner[]" value="0">Non-AC
                                <span class="text-danger">
                                    <?php
                                    if (isset($errors['air_conditioner'])) {
                                        echo ($errors['air_conditioner']);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-7 mb-3">
                                <label for="Seats">Seats:</label>
                                <input type="number" class="form-control" id="seats" name="seats" placeholder="Number of Seats">
                                <span class="text-danger">
                                    <?php
                                    if (isset($errors['seats'])) {
                                        echo ($errors['seats']);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>


                        <button class="btn btn-primary" type="submit">Add Bus</button>
                    </form>
            </div>
        </div>
        <?php
        require_once 'views/footer.php';
        ?>