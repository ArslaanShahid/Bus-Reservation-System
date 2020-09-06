<?php
require_once('models/user.php');
require_once('views/header.php');
require_once 'models/Route.php';

$info = Route::routeInfo($_GET['id']);

?>
<section id="breadcrumb">
    <div class="overly"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center">
                <div class="breadcrumbinfo">
                    <article>
                        <h2>
                            <?php
                            echo ($info->departure . ' to ' . $info->arrival);
                            ?>
                        </h2>
                        <a href="#">Home</a> <span>/</span>
                        <a class="active" href="#"><?php
                                                    echo ($info->departure . ' to ' . $info->arrival);
                                                    ?></a>
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
                        echo ($info->departure . ' to ' . $info->arrival);
                        ?>
                    </strong></p>
                <div class="margin-bottom-10"></div>

                <p>Dep Time: <?php echo(strtoupper($info->departure_time)); ?> <span class="text-success">(07 Sep 2020)</span></p>
                <div class="margin-bottom-5"></div>
                <strong>Total Seat: 6</strong>
                <div class="margin-bottom-5"></div>
                <strong>Ticket Price : <?php echo($info->fare); ?> PKR</strong>
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
                        <div class='col-2'>
                            <div class='seat occupied ChooseSeat ' data-item=''>
                                <div class='seat-body'>
                                    5
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'>&nbsp;</div>
                        <div class='col-2'>
                            <div class='seat occupied ChooseSeat ' data-item=''>
                                <div class='seat-body'>
                                    6
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-2'>
                            <div class='seat occupied ChooseSeat ' data-item=''>
                                <div class='seat-body'>
                                    9
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'>&nbsp;</div>
                        <div class='col-2'>
                            <div class='seat occupied ChooseSeat ' data-item=''>
                                <div class='seat-body'>
                                    10
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-2'>
                            <div class='seat occupied ChooseSeat ' data-item=''>
                                <div class='seat-body'>
                                    13
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'>&nbsp;</div>
                        <div class='col-2'>
                            <div class='seat occupied ChooseSeat ' data-item=''>
                                <div class='seat-body'>
                                    14
                                    <span class='seat-handle-left'></span>
                                    <span class='seat-handle-right'></span>
                                    <span class='seat-bottom'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6 col-sm-12">

                <form action="#" class="price-details" id="bookingFrm" method="post" accept-charset="utf-8">
                    <input type="hidden" name="_token" value="Wx5lUcV86bFS3SlAViOcb72g5Jd9XoFMjZVu2LcW">
                    <div class="form-group">
                        <label><strong>Choose Boarding Point <span class="text-danger">*</span></strong></label>
                        <select name="boarding" id="stoppage" class="form-control form-control-lg boarding_point">
                            <option value="">Boarding Point</option>
                            <option value="Paklines Daewoo Bus Terminal">Paklines Daewoo Bus Terminal</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <h4> Facilities</h4>
                        <div id="facilities">
                            <div class="funkyradio">
                                <div class="funkyradio-default">
                                    <input type="radio" checked />
                                    <label>AC</label>
                                </div>
                            </div>
                            <div class="funkyradio">
                                <div class="funkyradio-default">
                                    <input type="radio" checked />
                                    <label>Freshments</label>
                                </div>
                            </div>
                        </div>
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

                        <input type="hidden" name="trip_route_id" value="17">
                        <input type="hidden" name="fleet_registration_id" value="1">
                        <input type="hidden" name="trip_id_no" value="17643">
                        <input type="hidden" name="id_no" value="1598854370">
                        <input type="hidden" name="fleet_type_id" value="1">
                        <input type="hidden" name="total_seat">
                        <input type="hidden" name="seat_number">
                        <input type="hidden" name="price" value="270.00">
                        <input type="hidden" name="total_fare">
                        <input type="hidden" name="booking_date" value="2020-09-07 08:20:00">

                    </div>
                    <button id="submit-btn" class="btn btn-block">Continue</button>
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