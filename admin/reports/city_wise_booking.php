<?php
require_once "views/header.php";
require_once "../../models/Booking.php";
require_once "../../models/Bus.php";
require_once '../../models/Location.php';

$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$from_date_time = strtotime($from_date);
$to_date_time = strtotime($to_date);
if($from_date_time > $to_date_time) {
    $_SESSION['error'] = "Invalid Date";
    header("Location:".BASE_URL."admin/report.php");
    die;
}
$city_id=($_POST['city_id']);
if(empty($city_id)) {
    $_SESSION['error'] = "Missing City";
    header("Location:".BASE_URL."admin/report.php");
    die;
}

// echo("<pre>");
// print_r($cities);
// echo("</pre>");
// die;
$city=($_POST['city_id']);
$cities = Location::MyCity($city);
?>
<h4 class="text-center">City Wise Booking</h4>
<?php
// $result = Booking::CityWiseBooking($from_date , $to_date, $city_id);
//     echo("<pre>");
//     print_r($result['bookings']->departure);
//     echo('</pre>');
//     die;
$cities = Location::MyCity($city);
foreach ($cities as $city) {
echo("<span class='pull-left font-weight-bold mt-1'>". "Selected City:" ."<u>". $city->name . "</u>". "</span>");
}
?>


<br>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Date</td>
            <td>Bus No</td>
            <td>Name</td>
            <td>Contact No</td>
            <td>CNIC</td>
            <td>Gender</td>
            <td>Total Fare</td>
            <td>Departure</td>
            <td>Arrival</td>
            <td>Departure Time</td>
            <td>Seats</td>

        </tr>
    </thead>
    <?php
    $i = 1;
    $sum=0;
    $bookings = Booking::CityWiseBooking($from_date , $to_date, $city_id);
    // echo("<pre>");
    // print_r($bookings);
    // echo('</pre>');
    // die;
    if(count($bookings) == 0) {
    echo("<tr><td colspan='12' class='text-center'>No Record Found </td></tr>");
    }else foreach ($bookings as $booking) {
        $sum += $booking['total_fare'];
        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        echo ("<td>" . $booking['date'] . "</td>");
        echo ("<td>" . $booking['bus'] . "</td>");
        echo ("<td>" . $booking['name'] . "</td>");
        echo ("<td>" . $booking['contact_no'] . "</td>");
        echo ("<td>" . $booking['cnic'] . "</td>");
        echo ("<td>" . $booking['gender'] . "</td>");
        echo ("<td>" . $booking['total_fare'] . "</td>");
        echo ("<td>" . $booking['arrival'] . "</td>");
        echo ("<td>" . $booking['departure'] . "</td>");
        echo ("<td>" . $booking['departure_time'] . "</td>");

        $i++;
        echo("<td>");
        foreach($booking['seats'] as $seat) {
            echo($seat['seat_no'].',&nbsp;');
        }
        echo("</td>");
    }
    echo("<tr><td colspan='14' class='h6 font-weight-bold'>Total Booking: $sum PKR </td></tr>");

    ?>
</table>

<?php
require_once "views/footer.php";
?>