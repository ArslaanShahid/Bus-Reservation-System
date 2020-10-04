<?php
require_once "init.php";
// if (!isset($_GET['id']) ) {
//     header("Location:" . BASE_URL);
// }
require_once('models/user.php');
require_once('views/header.php');
require_once 'models/Route.php';
require_once 'models/TicketCancel.php';
$booking = $_GET['id'];

$ticket = new TicketCancel();


// echo("<pre>");
// print_r($booking);
// echo("</pre>");
// die;

?>

<body class="body-class bc blog">

    <section id="breadcrumb">
        <div class="overly"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <div class="breadcrumbinfo">
                        <article>
                            <h2>Cancel Ticket</h2>
                            <a class="active" href="<?php echo (BASE_URL); ?>"></a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========== Main Ticket Booking Area Start ===================== -->
    <div id="ticket-booking">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>Cancel Ticket Form</h4>
                    <div class="margin-bottom-10"></div>
                    <h6>Smart BRs</h6>
                    <div class="margin-bottom-10"></div>
                </div>
                
                <?php
            echo('<span class="col-12 text-center text-danger font-weight-bold">');
                if (isset($_SESSION['msg'])) {
                    echo ($_SESSION['msg']);
                    unset($_SESSION['msg']);
                }
                if (isset($_SESSION['errors'])) {
                    $errors = $_SESSION['errors'];
                    unset($_SESSION['errors']);
                }
               echo(' </span>');
               echo ('</div>');
                
                ?>


            <div class="margin-bottom-40"></div>

            <div class="row">
                
                <div class="col-md-6 col-sm-12 offset-3">

                    <form action="process/process_cancel_form.php" class="price-details" method="POST">
                    <input type="hidden" name="booking_id" value="<?php echo($booking); ?>">

                        <div class="form-group">
                            <label for="name"><strong>Account Email (For Refund)</strong></label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Your PayPal Email">
                            <div class="text-danger has_error">
                                <?php
                                if (isset($errors['email'])) {
                                    echo ($errors['email']);
                                }

                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name"><strong>Reason For Cancel</strong></label>
                            <input type="text" class="form-control" name="reason" placeholder="Enter Your Message">
                            <div class="has_error text-danger">
                                <?php
                                if (isset($errors['reason'])) {
                                    echo ($errors['reason']);
                                }

                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit Request</button>

                        </div>
                </div>




            </div>
            </form>

        </div>

    </div>


    </div>
    </div>

    <!-- =========== Main Ticket Booking Area End ===================== -->
    <div class="margin-bottom-60"></div>

    <?php
    require_once('views/footer.php');
    ?>