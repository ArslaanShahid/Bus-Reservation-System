<?php
require_once '../models/TicketCancel.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>
<div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-exchange">
                        </i>
                    </div>
                    <div>Manage Cancel Booking
                        <div class="page-title-subheading">Cancel Booking Request
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col-lg-12  mt-5">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"> </h5>

            <table class="table table-striped table-bordered" id="account" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>PayPal Email</th>
                        <th>Reason</th>
                        <th>Booking & User Info</th>
                        <th>Ticket Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    $tickets = TicketCancel::getAllCancelTicket();
                    foreach ($tickets as $ticket) {
                        echo ("<tr>");
                        echo ("<td>" . $i . "</td>");
                        echo ("<td>" . $ticket->email . "</td>");
                        echo ("<td>" . $ticket->reason . "</td>");
                        echo ("<td class='text-center'><a href='#' class='view_booking' data-id='" . $ticket->booking_id . "'><span class='fa fa-eye'></span></a></td>");
                        if($ticket->pending_status == 1)
                        {
                            echo ("<td><a href='process/process_cancelTicket.php?booking_id=".$ticket->booking_id."&id=".$ticket->id."' class='btn btn-sm btn-danger'>Cancel Ticket</a></td>");
                        }else{
                            echo ("<td><span class='badge badge-warning'>Ticket Cancelled</span></td>");
                        }
                        echo ("</tr>");
                        $i++;
                    }
                    // 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'views/footer.php';
?>

<!-- Route Modal -->
<div class="modal fade bd-example-modal-lg booking-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Booking Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact No.</th>
                            <th>Gender</th>
                            <th>CNIC</th>
                            <th>Total Fare</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

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

        $(".view_booking").click(function() {
            $(".booking-modal").modal();

            var id = $(this).data('id');
            var route = "process/process_getCancelBooking.php?id=" + id;

            $.ajax({
                url: route,
                type: 'GET',
                dataType: 'JSON',
                complete: function(jqXHR, textStatus) {
                    if (jqXHR.status == 200) {
                        var result = JSON.parse(jqXHR.responseText);
                        console.log(result);
                        if (result.hasOwnProperty('success')) {
                            var data = result.booking_info;
                            var output;
                            output = `<tr><td>${data.customer}</td><td>${data.contact_no}</td><td>${data.gender}</td><td>${data.cnic}</td><td>${data.total_fare}</td><td>${data.departure}</td><td>${data.arrival}</td></tr>`;

                            $("#tbody > tr").remove();
                            $("#tbody").append(output);
                            $(".booking-modal").modal();
                        } else {
                            alert('Contact Admin');
                        }

                    }
                }

            });
        });
    });
</script>