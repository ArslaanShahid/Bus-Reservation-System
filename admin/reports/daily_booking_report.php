<?php
require_once "views/header.php";
require_once "../../models/Booking.php";
?>
<h4 class="text-center">Daily Booking Report</h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Name</td>
            <td>Contact No</td>
            <td>CNIC</td>
            <td>Gender</td>
            <td>Total Fare</td>
            <td>Date</td>
            <td>Seat</td>

        </tr>
    </thead>
    <?php
    $i = 1;
    $bookings = Booking::dailyBooking();
    
    foreach ($bookings as $booking) {
        // echo("<pre>");
        // print_r($bookings);
        // echo('</pre>');
        // die;
        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        echo ("<td>" . $booking['name'] . "</td>");
        echo ("<td>" . $booking['contact_no'] . "</td>");
        echo ("<td>" . $booking['cnic'] . "</td>");
        echo ("<td>" . $booking['gender'] . "</td>");
        echo ("<td>" . $booking['total_fare'] . "</td>");
        echo ("<td>" . $booking['date']. "</td>");
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
require_once 'views/footer.php';
?>
