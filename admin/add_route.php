<?php
require_once 'views/header.php';
require_once 'views/sidebar.php';
require_once '../models/Location.php';
require_once '../models/Route.php';
require_once '../models/Bus.php';
require_once '../models/Employee.php';
$cities = Location::allCities();
$days = Route::allDays();
$buses = Bus::allBuses();
$driver = Employee::Driver();
// echo ("<pre>");
// print_r($driver);
// die;
// echo ("</pre>");

?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon fa fa-bus">
                </i>
            </div>
            <div>Manage Routes
                <div class="page-title-subheading">Create Route
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
<div class="main-card col-md-7 mb-2 card offset-2">
    <div class="card-body">
        <h5 class="card-title">Add Route</h6>
            <h5 class="text-danger">

            </h5>
            <form method="POST" action="<?php echo(BASE_URL); ?>process/process_add_route.php">
                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Route Bus:</label>
                        <div class="input-group">
                            <select class="form-control" name="bus_id" id="bus">
                                <option disabled selected value="">Select Route Bus:</option>
                                <?php
                                foreach ($buses as $bus) {
                                    echo ("<option value='" . $bus->id . "'>" . $bus->bus_no . " (" . $bus->seats . ")" . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['bus_id'])) {
                                echo ($errors['bus_id']);
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Departure:</label>
                        <div class="input-group">
                            <select class="form-control" name="departure" id="departure">
                                <option disabled selected value="">Select Departure City</option>
                                <?php
                                foreach ($cities as $city) {
                                    echo ("<option value='" . $city->id . "'>" . $city->name . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['departure'])) {
                                echo ($errors['departure']);
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Arrival:</label>
                        <div class="input-group">
                            <select class="form-control" name="arrival" id="arrival">
                                <option disabled selected value="">Select Arrival City</option>
                                <?php
                                foreach ($cities as $city) {
                                    echo ("<option value='" . $city->id . "'>" . $city->name . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['arrival'])) {
                                echo ($errors['arrival']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Fare:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="number" class="form-control" name="fare" placeholder="Enter Route Fare">
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['fare'])) {
                                echo ($errors['fare']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Duration:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" name="duration" placeholder="Enter Route Duration (Eg. 00:00)">
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['duration'])) {
                                echo ($errors['duration']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Departure Time:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="time" class="form-control" name="departure_time">
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['departure_time'])) {
                                echo ($errors['departure_time']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Distance :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="number" class="form-control" name="distance" placeholder="Enter Distance (KM)">
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['distance'])) {
                                echo ($errors['distance']);
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="validationCustomUsername">Route Days :</label>
                        <div class="icheck-primary">
                            <?php
                            foreach ($days as $day) {
                                echo ('<input type="checkbox" value=' . $day->id . ' name="days[]">&nbsp;');
                                echo ('<label for="remember">');
                                echo (ucfirst($day->day));
                                echo ('</label><br>');
                            }
                            ?>
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($errors['days'])) {
                                echo ($errors['days']);
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