<?php
require_once('models/user.php');
require_once('views/header.php');
require_once('models/Route.php');
require_once('models/Booking.php');
require_once('models/TicketCancel.php');
$bookings = TicketCancel:: CurrentTicketInfo($_GET['cnic']);

    // echo("<pre>");
    // print_r($bookings);
    // die;
    // echo ("</pre>");

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
                                <h2>Ticket Cancel</h2>
                                <a href="<?php echo(BASE_URL); ?>index.php">Home</a> <span>/</span>
                                <a class="active" href="#">Ticket Cancel</a>
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
            <div class=" text-center">
                <h1 class="text-center mb-4">Ticket Cancel</h1>
            </div>
            <div class="contact-form">
                <div class="container">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Gender</th>
                                <th>Cnic</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Time</th>
                                <th>Fare</th>
                                <th>Action</th>
                                <th>Refund</th>
                                
                            </thead>
                            <tbody>
                            <?php
                           if(count($bookings) == 0) {
                            echo("<tr><td colspan='11' class='text-danger text-center'><strong>No Booking Found</strong><br>Booked Ticket Can Be Cancel Before Departure Time</td></tr>");
                        }    
                            else foreach ($bookings as $booking){
                                echo('<tr>');
                                $date_only =date('Y-m-d',strtotime($booking->date));
                                echo('<td>'.$date_only.'</td>');
                                echo('<td>'.$booking->name.'</td>');
                                echo('<td>'.$booking->contact_no.'</td>');
                                echo('<td>'.$booking->gender.'</td>');
                                echo('<td>'.$booking->cnic.'</td>');
                                echo('<td>'.$booking->departure.'</td>');
                                echo('<td>'.$booking->arrival.'</td>');
                                echo('<td>'.$booking->departure_time.'</td>');
                                echo('<td>'.$booking->total_fare.'</td>');

                                if ($booking->request_status == 1){
                                    echo('<td class="text-success font-weight-bold">Request Sent</td>');

                                }
                                else{
                                    echo('<td><a href="'.(BASE_URL).'cancel_ticket_form.php?id='.$booking->id.'" target="_blank" class="btn btn-warning">Cancel Ticket</a></td>');

                                }
                                if($booking->cancel_status == 0 ){
                                    echo('<td class="text-danger font-weight-bold">Refund Pending</td>');
                                }
                                else{
                                    echo('<td class="text-success font-weight-bold">Refunded</td>');
                                }
    
                                echo('</tr>');
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