<?php
require_once "views/header.php";
require_once "../../models/Booking.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Name</td>
            <td>Contact No</td>
            <td>CNIC</td>
            <td>Gender</td>
            <td>Seats</td>
            <td>Total Fare</td>
            <td>Date</td>

        </tr>
    </thead>
    <?php
    $i = 1;
    $bookings = Booking::showBooking();
    foreach ($bookings as $booking) {
        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        echo ("<td>" . $booking->name . "</td>");
        echo ("<td>" . $booking->contact_no . "</td>");
        echo ("<td>" . $booking->cnic . "</td>");
        echo ("<td>" . $booking->gender . "</td>");
        echo ("<td>" . $booking->seat_no . "</td>");
        echo ("<td>" . $booking->total_fare . "</td>");
        echo ("<td>" . $booking->date . "</td>");
        $i++;
    }
    ?>
</table>

<?php
require_once 'views/footer.php';
?>