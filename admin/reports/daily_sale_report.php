<?php
require_once "views/header.php";
require_once "../../models/Booking.php";
?>
<h4 class="text-center">Daily Sale Report</h4>
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
    $sum=0;
    $bookings = Booking::dailyBooking();
    if(count($bookings) == 0) {
        echo("<tr><td colspan='7' class='text-center'>No Booking Found</td></tr>");
    }
    else foreach ($bookings as $booking) {
        $sum+= $booking['total_fare'];
        echo ("<tr>");
        echo ("<td>" . $i ."</td>");
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
    echo("<tr><caption class='h6 text-right'>Total Sale: $sum PKR </caption></tr>");
    ?>
</table>

<?php
require_once 'views/footer.php';
?>
