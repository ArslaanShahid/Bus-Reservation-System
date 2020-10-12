<?php
require_once 'views/header.php';
require_once 'models/Location.php';
if (isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $obj_user = new User();
}
$result = $obj_user->profile();

?>
<body class="body-class bc blog">

<section id="breadcrumb">
    <div class="overly"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center">
                <div class="breadcrumbinfo">
                    <article>
                        <h2>Update Account</h2>
                        <a href="index.php">Home</a> <span>/</span>
                        <a class="active" href="index.php">Update Account</a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
        <div class="table-responsive">
            <div class="container">

                <?php
                if (isset($_SESSION['msg'])) {
                    echo ("<h2 class='alert alert-danger text-center'>" . $_SESSION['msg'] . "</h2>");
                    unset($_SESSION['msg']);
                }
                if (isset($_SESSION['errors'])) {
                    $errors = $_SESSION['errors'];
                    unset($_SESSION['errors']);
                }
                ?>
                <div class="form-group col-md-8  offset-3">
                    <div class="signup-form">
                        <!--sign up form-->

                        <form id="c-form" action="<?php echo (BASE_URL); ?>process/process_update_account.php" method="post">
                        <input type="hidden" id="city" value="<?php echo ($obj_user->city_id); ?>">
                            <div class="form-group col-md-8">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" value="<?php echo ($obj_user->first_name); ?>" class="user_name form-control" placeholder="Frist Name">
                                <span class="user_name text-danger">
                                    <?php
                                    if (isset($errors['first_name'])) {
                                        echo ($errors['first_name']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" class="last_name form-control" placeholder="Last Name" value="<?php echo ($obj_user->last_name); ?>">
                                <span class="email text-danger">
                                    <?php
                                    if (isset($errors['last_name'])) {
                                        echo ($errors['last_name']);
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="mobile_no">Contact No:</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="contact_number form-control" placeholder="Contact Number" value="<?php echo ($obj_user->mobile_no); ?>">
                                <span class="contact_number text-danger">
                                    <?php
                                    if (isset($errors['mobile_no'])) {
                                        echo ($errors['mobile_no']);
                                    }
                                    ?>
                                </span>
                            </div>


                            <div class="form-group col-md-8">
                                <label for="gender">Gender:</label>
                                <div>
                                    <label>Male: <input type="radio" name="gender[]" style="height: 15px;" <?php if ($obj_user->gender == "male") echo ("checked") ?> value="male"></label>
                                    <label> &nbsp;&nbsp;&nbsp;Female: <input type="radio" name="gender[]" style="height: 15px;" value="female" <?php if ($obj_user->gender == "female") echo ("checked"); ?>></label>
                                </div>
                                <span class="text-danger">
                                    <?php
                                    if (isset($errors['gender'])) {
                                        echo ($errors['gender']);
                                    }
                                    ?>
                                </span>

                            </div>

                            <div class="from-group col-md-8">
                                <label for="password">Date Of Birth:</label>
                                <input type="date" name="date_of_birth" class="form-control">
                                <span class="date_of_birth text-danger">
                                    <?php
                                    if (isset($errors['date_of_birth'])) {
                                        echo ($errors['date_of_birth']);
                                    }
                                    ?>
                                </span>
                            </div>


                            <div class="form-group col-md-8">
                                <label for="state">State:</label>
                                <select class="form-control" name="state_id" id="state_id">
                                    <option value="">--Select State --</option>
                                    <?php
                                    $states = Location::states();
                                    foreach ($states as $state) {
                                        if ($obj_user->state_id == $state->id) {
                                            echo ("<option value='" . $state->id . "' selected>" . $state->name . "</option>");
                                        } else {
                                            echo ("<option value='" . $state->id . "'>" . $state->name . "</option>");
                                        }
                                    }

                                    ?>
                                </select>
                                <span class="state_id text-danger">
                                    <?php
                                    if (isset($errors['state_id'])) {
                                        echo ($errors['state_id']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="city">City:</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="">--Select City --</option>
                                    <?php
                                    foreach ($cities as $city) {
                                        if ($obj_user->city_id == $city->id) {
                                            echo ("<option value='" . $city->id . "' selected>" . $city->name . "</option>");
                                        } else {
                                            echo ("<option value='" . $city->id . "'>" . $city->name . "</option>");
                                        }
                                    }
                                    ?>

                                </select>
                                <span class="city_id text-danger">
                                    <?php
                                    if (isset($errors['city_id'])) {
                                        echo ($errors['city_id']);
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="form-group col-md-2 col-md-offset-3">
                                <input type="submit" value="Update Account" class="btn-primary">
                            </div>

                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
            </section>
            <!--/form-->
        </div>
    </div>
    </div>
    <br>
</body>

<?php
require_once 'views/footer.php';
?>


<script>
    $(document).ready(function(e) {
        $("#state_id").change(function(e) {
            $("#city_id > option~option").remove();
            var state_id = $("#state_id").val();
            if (state_id == "") {
                return;
            }
            var data = {
                id: state_id,
                action: 'get_cities',
            };
            $.ajax({
                url: "<?php echo(BASE_URL);?>process/process_location.php",
                data: data,
                dataType: 'JSON',
                type: 'POST',
                beforeSend: function(xhr) {
                    $(".state_id").html("<img src ='<?php echo (BASE_URL); ?>assets/images/ajax-loader.gif' alt='loader' width='20px' height='20px'>");
                },
                complete: function(jqXHR, textStatus) {
                    if (jqXHR.status == 200) {
                        var result = jqXHR.responseText;
                        result = JSON.parse(result);
                        if (result.hasOwnProperty('success')) {
                            var cities = result.cities;
                            var output = "";
                            cities.forEach(function(city) {
                                output += "<option value='" + city.id + "'>" + city.name + "</option>";
                            });
                            $("#city_id").append(output);
                        } else if (result.hasOwnProperty('error')) {
                            alert("Contact Admin" + result.msg);
                        } else {
                            alert("Something Went Wrong Contact Admin");
                        }
                        $(".state_id").html(" ");
                    } else {
                        alert("Something Went Wrong Contact Admin");
                    }
                }
            });

        });
        var state_id = $("#state_id").val();
        var data = {
            id: state_id,
            action: 'get_cities',
        };
        $.ajax({
            url: "<?php echo(BASE_URL); ?>process/process_location.php",
            data: data,
            dataType: 'JSON',
            type: 'POST',
            beforeSend: function(xhr) {
                $(".state_id").html("<img src ='<?php echo (BASE_URL); ?>assets/images/ajax-loader.gif' alt='loader' width='20px' height='20px'>");
            },
            complete: function(jqXHR, textStatus) {
                if (jqXHR.status == 200) {
                    var result = jqXHR.responseText;
                    result = JSON.parse(result);
                    if (result.hasOwnProperty('success')) {
                        var cities = result.cities;
                        var output = "";
                        cities.forEach(function(city) {
                            output += "<option value='" + city.id + "'>" + city.name + "</option>";
                        });
                        $("#city_id").append(output);
                    } else if (result.hasOwnProperty('error')) {
                        alert("Contact Admin" + result.msg);
                    } else {
                        alert("Something Went Wrong Contact Admin");
                    }
                    $(".state_id").html(" ");
                } else {
                    alert("Something Went Wrong Contact Admin");
                }
            }
        });

    });
</script>