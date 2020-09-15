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
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>CNIC</th>
                        <th>Gender</th>
                        <th>Contact No</th>
                        <th>Total Fare</th>
                        <th>Date</th>
                        <th>View Seats</th>
                        <th>View Route</th>
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
                        echo ("<td>" . $booking->contact_no . "</td>");
                        echo ("<td>" . $booking->cnic . "</td>");
                        echo ("<td>" . $booking->gender . "</td>");
                        echo ("<td>" . $booking->contact_no . "</td>");
                        echo ("<td>" . $booking->total_fare . "</td>");
                        echo ("<td>" . $booking->date . "</td>");
                        echo ("<td class='text-center'><a href='#' class='seats' title='View Booked Seats' data-id='" . $booking->id . "'><span class='fa fa-eye'></span></a></td>");
                        echo ("<td class='text-center'><a href='#' class='route-info' title='View Route Info' data-id='" . $booking->route_id . "'><span class='fa fa-eye'></span></a></td>");
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

<!-- Seat Information Modal -->
<div class="modal fade bd-example-modal-lg seats-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Seats Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Seat Number</th>
                            <th>Fare Per Seat</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-seat">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Route Modal -->
<div class="modal fade bd-example-modal-lg route-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Route Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Fare</th>
                            <th>Duration</th>
                            <th>Departure Time</th>
                            <th>Distance</th>
                            <th>Day</th>
                            <th>Bus No</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-route">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".seats").click(function() {
            var id = $(this).data('id');
            var route = "process/process_getSeats.php?id=" + id;
            $.ajax({
                url: route,
                type: 'GET',
                dataType: 'JSON',
                complete: function(jqXHR, textStatus) {
                    if (jqXHR.status == 200) {
                        var result = JSON.parse(jqXHR.responseText);
                        if (result.hasOwnProperty('success')) {
                            var info = result.data;
                            var output;
                            info.forEach((data) => {
                                output += `<tr><td>${data.name}</td><td>${data.seat_no}</td><td>${data.fare}</td></tr>`;
                            });

                            $("#tbody-seat > tr").remove();
                            $("#tbody-seat").append(output);
                            $(".seats-modal").modal();
                        } else {
                            alert('Contact Admin');
                        }

                    }
                }

            });
        });

        $(".route-info").click(function() {
            var id = $(this).data('id');
            var route = "process/process_getRouteInfo.php?id=" + id;
            $.ajax({
                url: route,
                type: 'GET',
                dataType: 'JSON',
                complete: function(jqXHR, textStatus) {
                    if (jqXHR.status == 200) {
                        var result = JSON.parse(jqXHR.responseText);
                        console.log(result);
                        if (result.hasOwnProperty('success')) {
                            var data = result.data;
                            var output;
                            output = `<tr><td>${data.departure}</td><td>${data.arrival}</td><td>${data.fare}</td><td>${data.duration}</td><td>${data.departure_time}</td><td>${data.distance}</td><td>${data.day}</td><td>${data.bus_no}</td></tr>`;

                            $("#tbody-route > tr").remove();
                            $("#tbody-route").append(output);
                            $(".route-modal").modal();
                        } else {
                            alert('Contact Admin');
                        }

                    }
                }

            });
        });
    });
</script>