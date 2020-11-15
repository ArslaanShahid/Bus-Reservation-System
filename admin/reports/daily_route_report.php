<?php
require_once "views/header.php";
require_once "../../models/Route.php";
?>
<h4 class="text-center">Daily Route Report</h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Bus</td>
            <td>Day</td>
            <td>From (Departure)</td>
            <td>To (Arrival)</td>
            <td>Fare</td>
            <td>Time</td>

        </tr>
    </thead>
    <?php
    $i = 1;
    $routes = Route::DailyRoute();
    // echo("<pre>");
    // print_r($routes);
    // echo('</pre>');
    // die;
    foreach ($routes as $route) {

        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        echo ("<td>" . $route->bus . "</td>");
        echo ("<td>" . ucfirst($route->day) . "</td>");
        echo ("<td>" . ucfirst($route->departure) . "</td>");
        echo ("<td>" . ucfirst($route->arrival) . "</td>");
        echo ("<td>" . $route->fare . "</td>");
        echo ("<td>" . $route->time . "</td>");
        $i++;
    }
    ?>
</table>

<?php
require_once 'views/footer.php';
?>