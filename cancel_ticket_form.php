<?php
require_once "init.php";
// if (!isset($_GET['id']) || !isset($_GET['date'])) {
//     header("Location:" . BASE_URL);
// }
require_once('models/user.php');
require_once('views/header.php');
require_once 'models/Route.php';

// $info = Route::routeInfo($_GET['id'], $_GET['date']);
// // echo('<pre>');
// // print_r($info);
// // echo('</pre>');
// // die;
// $route_data = $info['route_data'];
// $seats = $info['seats'];
// echo("<pre>");
// print_r($info);
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
            </div>

            <div class="margin-bottom-60"></div>

            <div class="row">



                <div class="col-md-6 col-sm-12 offset-3">

                    <form action="process/process_cancel_form" class="price-details" id="cancelForm" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="name"><strong>Account Email (For Refund)</strong></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your PayPal Email">
                            <div class="text-danger has_error name">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name"><strong>Reason For Cancel</strong></label>
                            <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Message">
                            <div class="has_error text-danger contact_no">

                            </div>
                        </div>
                        <div class="form-group">
                            <input type="button" value="Submit Request" class="btn btn-primary" name="submit" id="submit">
                            <div class="has_error text-danger contact_no">

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
   