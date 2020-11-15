<?php
require_once('views/header.php');
// if (!isset($_GET['id']) || !isset($_GET['date'])) {
//     header("Location:" . BASE_URL);
// }
require_once('models/Route.php');

$info = Route::routeInfo($_GET['id'], $_GET['date']);

$route_data = $info['route_data'];
$seats = $info['seats'];

// echo('<pre>');
// print_r($checkTime);
// echo('</pre>');
// die;

// // if($bookTime)
// echo('<pre>');
// print_r($route_data);
// echo('</pre>');
// die;

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
                            <h2>
                                <?php
                                echo ($route_data->departure . ' to ' . $route_data->arrival);
                                ?>
                            </h2>
                            <a href="#">Home</a> <span>/</span>
                            <a class="active" href="#"><?php echo ($route_data->departure . ' to ' . $route_data->arrival); ?></a>
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
                    <h4>Smart BRS</h4>
                    <div class="margin-bottom-10"></div>
                    <h6>Travels</h6>
                    <div class="margin-bottom-10"></div>

                    <p><strong><span class="text-danger">Route Name:</span>
                            <?php
                            echo ($route_data->departure . ' to ' . $route_data->arrival);
                            ?>
                        </strong></p>
                    <div class="margin-bottom-10"></div>

                    <p>Dep Time: <?php echo (strtoupper($route_data->departure_time)); ?> <span class="text-danger"><strong>(<?php echo ($_GET['date']); ?>)</strong></span></p>
                    <div class="margin-bottom-5"></div>
                    <strong>Total Seat:<?php echo ($route_data->seats) ?> </strong>
                    <div class="margin-bottom-5"></div>
                    <strong>Ticket Price : <?php echo ($route_data->fare); ?> PKR</strong>
                </div>
            </div>

            <div class="margin-bottom-60"></div>

            <div class="row">
                <div class="offset-md-1 col-md-5 col-sm-10 ">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="seat  ">
                                <div class='seat-body'>
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                            <p>Available Seat</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="seat ChooseSeat selected ">
                                <div class='seat-body'>
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                            <p>Selected Seat</p>
                        </div>


                        <div class="col-md-4 col-sm-4">
                            <div class="seat ladies last-seat seat occupied ChooseSeat ">
                                <div class='seat-body'>
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                            <p>Booked Seat</p>
                        </div>
                    </div>
                    <div class="margin-bottom-40"></div>

                    <div class="all-seats">
                        <div class='row'>
                            <?php
                            foreach ($seats as $seat) {
                                echo ("<div class='col-2'>");
                                if ($seat['status'] == 1) {
                                    echo ("<div class='seat occupied' data-item=''>");
                                    echo ("<div class='seat-body' style='background-color:#dc3545;cursor:no-drop; color:white;'>");
                                } else {
                                    echo ("<div class='seat occupied ChooseSeat' data-item=''>");
                                    echo ("<div class='seat-body' style=''>");
                                }

                                echo ($seat['seat_no']);
                                echo ("<span class='seat-handle-left'></span>");
                                echo ("<span class='seat-handle-right'></span>");
                                echo ("<span class='seat-bottom'></span>");
                                echo ("</div></div></div>");
                                echo ("<div class='col-2'>&nbsp;</div>");
                            }

                            ?>
                        </div>

                    </div>
                </div>



                <div class="col-md-6 col-sm-12">

                    <form action="" class="price-details" id="bookingForm" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="name"><strong>Name</strong></label>
                            <input type="text" class="form-control" name="name" id="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" placeholder="Enter Your Name">
                            <div class="text-danger has_error name">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name"><strong>Contact No</strong></label>
                            <input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Contact No">
                            <div class="has_error text-danger contact_no">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name"><strong>CNIC</strong></label>
                            <input type="number" min="0" class="form-control" name="cnic" id="cnic" placeholder="Enter Your Cnic">
                            <div class="has_error text-danger cnic"></div>
                        </div>
                        <div class="form-group">
                            <label for="name"><strong>Gender</strong></label>
                            <label for="male"><input type="radio" checked name="gender[]" value="male" id="male" class="gender"> Male</label>
                            <label for="female"><input type="radio" name="gender[]" id="female" value="female" class="gender"> FeMale</label>
                            <span class="text-danger gender_error has_error"></span>
                        </div>
                        <div class="table-responsive ">
                            <table class="table table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td class="text-right" style="width: 30%;">Seat(s)</td>
                                        <th id="seatPreview">---</th>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b> Total</b></td>
                                        <th id="grandTotalPreview">0</th>
                                    </tr>
                                </tbody>
                            </table>

                            <input type="hidden" name="trip_route_id" value="<?php echo ($_GET['id']); ?>">
                            <input type="hidden" name="total_seat" value="<?php echo ($route_data->seats) ?>">
                            <input type="hidden" name="seat_number">
                            <input type="hidden" name="price" value="<?php echo ($route_data->fare) ?>">
                            <input type="hidden" value="0" name="total_fare">
                            <input type="hidden" name="booking_date" value="<?php echo ($_GET['date']); ?>">
                            <input type="hidden" name="departure_time" value="<?php echo ($route_data->departure_time) ?>">

                        </div>
                        <div class="row d-flex justify-content-center">
                            <div id="paypal-button"></div>
                            <!-- <button id="submit-btn" class="btn btn-block col-md-10 offset-md-1">Continue
                            </button> -->
                            <div class="col-md-1">
                                <span class="loader"></span>
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        $(document).ready(function(e) {

            var paypalActions;
            var final;

            paypal.Button.render({
                // Configure environment
                validate: function(actions) {
                    actions.disable();
                    paypalActions = actions;
                },
                // Called for every click on the PayPal button even if actions.disabled
                onClick: function() {
                    var trip_route_id = $("input[name=trip_route_id]").val();
                    var total_seat = $("input[name=total_seat]").val();
                    var seat_number = $("input[name=seat_number]").val();
                    var price = $("input[name=price]").val();
                    var total_fare = $("input[name=total_fare]").val();
                    final = total_fare;
                    var booking_date = $("input[name=booking_date]").val();
                    var departure_time = $("input[name=departure_time]").val();
                    var contact_no = $("#contact_no").val();
                    var name = document.getElementById('name').value;
                    var cnic = document.getElementById('cnic').value;
                    var gender = $(".gender").val();
                    let data = {
                        route_id: trip_route_id,
                        total_seat: total_seat,
                        seat_number: seat_number,
                        price: price,
                        total_fare: total_fare,
                        booking_date: booking_date,
                        name: name,
                        cnic: cnic,
                        gender: gender,
                        contact_no: contact_no,
                        departure_time: departure_time,
                    };
                    console.log(data);
                    var val = validate(data, paypalActions);
                    if (val == false) {
                        paypalActions.enable();
                    }
                },
                env: 'sandbox',
                client: {
                    sandbox: 'Acv2kaJzRkp_U66PvtzOXI7EGpXyp0jnJUum19LvxSjymXjseK7O9XbIIcdhEps8LfM1E8sMwLkPJQ6c',
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'large',
                    color: 'gold',
                    shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function(data, actions) {
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: final,
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function() {
                        // Show a confirmation message to the buyer
                        $('#bookingForm').trigger('submit');
                    });
                }
            }, '#paypal-button');
        });
    </script>