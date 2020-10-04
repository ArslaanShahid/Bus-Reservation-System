<?php
require_once '../models/Route.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>

<div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-random">
                        </i>
                    </div>
                    <div>View Routes
                        <div class="page-title-subheading">Routes Information
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-lg-12  mt-5">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"> </h5>

            <table class="table table-striped table-bordered" id="account" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Fare</th>
                        <th>Duration</th>
                        <th>Departure Time</th>
                        <th>Distance</th>
                        <th>Day</th>
                        <th>Bus No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    $routes = Route::viewRoute();
                    foreach ($routes as $route) {
                        echo ("<tr>");
                        echo ("<td>" . $i . "</td>");
                        echo ("<td>" . $route->departure . "</td>");
                        echo ("<td>" . $route->arrival . "</td>");
                        echo ("<td>" . $route->fare . "</td>");
                        echo ("<td>" . $route->duration . "</td>");
                        echo ("<td>" . $route->departure_time . "</td>");
                        echo ("<td>" . $route->distance . "</td>");
                        echo ("<td>" . ucfirst($route->day) . "</td>");
                        echo ("<td>" . $route->bus . "</td>");
                        echo ("<td><a href='".BASE_URL."process/process_delete_route.php?id=".$route->id."' class='text-danger offset-5 fa fa-trash'></a></td>");
                        echo ("</tr>");
                        
                        $i++;
                    }
                    // 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'views/footer.php';
?>