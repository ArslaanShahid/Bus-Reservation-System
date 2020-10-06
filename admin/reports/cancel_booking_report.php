<?php
require_once "views/header.php";
require_once "../../models/Booking.php";
?>
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
    $bookings = Booking::CancelBooking();
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