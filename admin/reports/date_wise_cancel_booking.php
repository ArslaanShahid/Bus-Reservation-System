<?php
require_once "views/header.php";
require_once "../../models/Booking.php";
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$from_date_time = strtotime($from_date);
$to_date_time = strtotime($to_date);
if($from_date_time > $to_date_time) {
    $_SESSION['error'] = "Invalid Date";
    header("Location:".BASE_URL."admin/report.php");
    die;
}
?>
<h4 class="text-center">Date Wise Cancel Booking Report</h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Date</td>
            <td>Name</td>
            <td>Contact No</td>
            <td>CNIC</td>
            <td>Gender</td>
            <td>Total Fare</td>
            <td>Bus No</td>
            <td>Departure</td>
            <td>Arrival</td>
            <td>Departure Time</td>
            <td>Seats</td>

        </tr>
    </thead>
    <?php
    $i = 1;
    $bookings = Booking::DateWiseCancelBooking($from_date , $to_date);
    // echo("<pre>");
    // print_r($bookings);
    // echo('</pre>');
    // die;
    if(count($bookings) == 0) {
    echo("<tr><td colspan='7' class='text-center'>No Booking Found</td></tr>");
    }else foreach ($bookings as $booking) {
        
        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        echo ("<td>" . $booking['date'] . "</td>");
        echo ("<td>" . $booking['name'] . "</td>");
        echo ("<td>" . $booking['contact_no'] . "</td>");
        echo ("<td>" . $booking['cnic'] . "</td>");
        echo ("<td>" . $booking['gender'] . "</td>");
        echo ("<td>" . $booking['total_fare'] . "</td>");
        echo ("<td>" . $booking['bus'] . "</td>");
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
    ?>
</table>

<?php
require_once "views/footer.php";
?>