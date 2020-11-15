<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once "init.php";
if (!isset($_GET['from']) || !isset($_GET['to']) || !isset($_GET['date'])) {
    header("Location:" . BASE_URL);
}
require_once('models/user.php');
require_once('views/header.php');
require_once('models/Route.php');

$routes = Route::search($_GET['from'], $_GET['to'], $_GET['date']);
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
                                <h2>Search Ticket</h2>
                                <a href="index.php">Home</a> <span>/</span>
                                <a class="active" href="#">Search</a>
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
            <div class="row offset-5">
                <h1 class="text-center mb-5">Bus Routes</h1>
            </div>
            <div class="contact-form">
                <div class="container">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <th>Operator/Bus</th>
                                <th>Departure</th>
                                <th>Duration</th>
                                <th>Distance</th>
                                <th>Arrival</th>
                                <th>Total Seats</th>
                                <th>Bus Type</th>
                                <th>Fare</th>
                                <th>Book Seats</th>
                            </thead>
                            <tbody>
                                <?php
                                $currentTime = strtotime(Date("Y-m-d H:i a"));
                                if (isset($routes['routes']) == 0) {
                                    echo ("<tr><td colspan='11' class='text-danger text-center'><strong>No Route Found</strong></td></tr>");
                                } else {
                                    foreach ($routes['routes'] as $route) {
                                        $routeTime = strtotime($_GET['date'] . ' ' . $route->departure_time);
                                        $currentTime = strtotime(Date("Y-m-d H:i a"));
                                        // print_r(strtotime(Date("Y-m-d H:i a")));
                                        // die;
                                        // print_r(strtotime($_GET['date'] . ' ' . $route->departure_time));
                                        // die;
                                        echo ('<tr>');
                                        echo ('<td><b>' . $route->bus . '</b><br><span>' . $route->departure . ' <b>To</b> ' . $route->arrival . '</span><br><span class="text-success"><b>' . $routes['date'] . '</b></span></td>');
                                        echo ('<td><span class="text-success"><b>' . $route->departure_time . '</b></span><br>' . $route->departure . '</td>');
                                        echo ('<td>' . $route->duration . ' <span class="text-danger"><b>HRS</b></span></td>');
                                        echo ('<td>' . $route->distance . ' <span class="text-danger"><b>KM</b></span></td>');
                                        echo ('<td>' . $route->arrival . '</td>');
                                        echo ('<td>' . $route->seats . '</td>');
                                        if ($route->air_conditioner == 1) {
                                            echo ('<td>AC</td>');
                                        } else {
                                            echo ('<td>Non AC</td>');
                                        }
                                        echo ('<td>' . $route->fare . ' <b>PKR</b></td>');
                                        if ($currentTime > $routeTime) {
                                            echo ('<td class="text-danger"><b>Time Passed</b></td>');
                                        } else {
                                            echo ('<td><a href="' . (BASE_URL) . 'book_ticket.php?id=' . $route->id . '&date=' . $_GET['date'] . '" target="_blank" class="btn btn-primary">Book Ticket</a></td>');
                                        }
                                        echo ('</tr>');
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!--================================
        contact us part end
    =====================================-->

    </div>
    <!--End Body Wrap-->

</body>

<?php
require_once('views/footer.php');
?>