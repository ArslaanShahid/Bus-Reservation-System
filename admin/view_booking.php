<?php
require_once '../models/Booking.php';
require_once 'views/header.php';
require_once 'views/sidebar.php';
?>


<div class="col-lg-12  mt-5">
    <h2 class="text-center">Booking Records</h2>

    <br>
    <br>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"> </h5>

            <table class="table table-striped table-bordered" id="account" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Contact No</th>
                        <th>CNIC</th>
                        <th>Gender</th>
                        <th>Seat No</th>
                        <th>Total Fare</th>
                        <th>Route</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i = 1;
                    $bookings = Booking::showBooking();
                    foreach ($bookings as $booking) {
                        echo ("<tr>");
                        echo ("<td>" . $i . "</td>");
                        echo ("<td>" . $booking->name . "</td>");
                        echo ("<td>" . $booking->cnic . "</td>");
                        echo ("<td>" . $booking->gender . "</td>");
                        echo ("<td>" . $booking->seat_no . "</td>");
                        echo ("<td>" . $booking->total_fare . "</td>");


                        echo ("</tr>");
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
require_once 'views/footer.php';
?>