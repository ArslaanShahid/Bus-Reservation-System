<footer id="contact" class="theme-footer-one">
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6  col-sm-12 text-center">
                    <p>&copy;Developed by Team Unity</p>
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                    <ul class="footer-soical">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end -->



<!--Start ClickToTop-->
<div class="totop">
    <a href="#top"><i class="fa fa-arrow-up"></i></a>
</div>
<!--End ClickToTop-->
</div>
<!--End Body Wrap-->

<!--jQuery JS-->
<script src="assets/front/js/jquery.2.1.2.min.js"></script>
<!--Bootstrap JS-->
<script src="assets/front/js/bootstrap.min.js"></script>
<!--Counter JS-->
<script src="assets/front/js/plugins/waypoints.js"></script>
<script src="assets/front/js/plugins/jquery.counterup.min.js"></script>

<script src="assets/admin/js/toastr.min.js"></script>
<script src="assets/admin/js/sweetalert.js"></script>


<script src="assets/front/js/jquery.autocomplete.js"></script>
<script src="assets/front/js/flatpickr.js"></script>

<!--Owl Carousel JS-->
<script src="assets/front/js/plugins/owl.carousel.min.js"></script>
<!--Venobox JS-->
<script src="assets/front/js/plugins/venobox.min.js"></script>
<!--Slick Slider JS-->
<script src="assets/front/js/plugins/slick.min.js"></script>
<!--Main-->
<script src="assets/js/select2.min.js"></script>
<script src="admin/assets/scripts/toastr.min.js"></script>
<script src="assets/front/js/custom.js"></script>
<script src="assets/front/js/jquery.seat-charts.min.js"></script>


<script>
    $(document).ready(function(e) {
        $('#arrival').select2();
        $('#departure').select2();
    });
</script>
<script>
    toastr.options.closeButton = true;
    toastr.options.preventDuplicate = true;
    toastr.options.progressBar = true;
    <?php
    if (isset($_SESSION['success'])) {
        echo ("toastr.success('" . $_SESSION['success'] . "')");
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo ("toastr.error('" . $_SESSION['error'] . "')");
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['info'])) {
        echo ("toastr.info('" . $_SESSION['info'] . "')");
        unset($_SESSION['info']);
    }
    ?>
</script>
<script>
    $(document).ready(function() {

        $('.boarding_point').select2();


        /*
         *------------------------------------------------------
         * @function: findBookingInformation()
         * @return    : location, facilities, seatsList
         *------------------------------------------------------
         */
        var total_seat = $('input[name=total_seat]');
        var total_fare = $('input[name=total_fare]');
        var seat_number = $('input[name=seat_number]');

        var price = $('input[name=price]').val();
        var booking_date = $('input[name=booking_date]');

        var seatPreview = $('#seatPreview');
        var pricePreview = $('#pricePreview');
        var grandTotalPreview = $('#grandTotalPreview');
        var outputPreview = $('#outputPreview');

        if (total_seat.val() == '') {
            $("#submit-btn").attr('disabled', true);
        }

        /*
         *------------------------------------------------------
         * Choose seat(s)
         * @function: findPriceBySeat
         * @return  : selected seat(s), price and group price
         *------------------------------------------------------
         */

        $('body').on('click', '.ChooseSeat', function() {
            var seat = $(this);
            if (seat.attr('data-item') != "selected") {
                seat.removeClass('occupied').addClass('selected').attr('data-item', 'selected');
            } else if (seat.attr('data-item') == "selected") {
                seat.removeClass('selected').addClass('occupied').attr('data-item', '');
            }
            //reset seat serial for each click
            var seatSerial = "";
            var countSeats = 0;

            $("div[data-item=selected]").each(function(i, x) {
                countSeats = i + 1;
                seatSerial += $(this).text().trim() + ", ";
            });

            total_fare.val(countSeats * price);
            $("#grandTotalPreview").text((countSeats * price) + " PKR");
            total_seat.val(countSeats);
            seat_number.val(seatSerial);
            seatPreview.html(seatSerial);

            if (countSeats > 0) {
                $("#submit-btn").attr('disabled', false);
            } else {
                $("#submit-btn").attr('disabled', true);
            }
        });


        $(document).on('click', "#submit-btn", function(e) {
            e.preventDefault();
            var boarding = $("input[name=boarding]").val();
            var trip_route_id = $("input[name=trip_route_id]").val();
            var fleet_registration_id = $("input[name=fleet_registration_id]").val();
            var trip_assign_id_no = $("input[name=trip_id_no]").val();
            var id_no = $("input[name=id_no]").val();
            var fleet_type_id = $("input[name=fleet_type_id]").val();
            var total_seat = $("input[name=total_seat]").val();
            var seat_number = $("input[name=seat_number]").val();
            var price = $("input[name=price]").val();
            var total_fare = $("input[name=total_fare]").val();
            var booking_date = $("input[name=booking_date]").val();

            $.ajax({
                type: "post",
                url: "https://booking.pak-lines.com/checked-seat",
                //contentType: false,
                //processData: false,
                data: {
                    boarding: boarding,
                    trip_route_id: trip_route_id,
                    fleet_registration_id: fleet_registration_id,
                    trip_assign_id_no: trip_assign_id_no,
                    id_no: id_no,
                    fleet_type_id: fleet_type_id,
                    total_seat: total_seat,
                    seat_number: seat_number,
                    price: price,
                    total_fare: total_fare,
                    booking_date: booking_date
                },

                success: function(data) {
                    console.log(data)
                    if (data.status == 1000) {
                        toastr.error(data.arr + " Seat Booked Yet. <br> Please select another seat");
                    }
                    if (data.status == 2000) {
                        toastr.error("Only 5 Seats can be Booked. <br> Please select 5 seats");
                    }
                    if (data.pnr) {
                        window.location.href = "https://booking.pak-lines.com/seat-book/details" + '/' + data.pnr;
                    }
                },

                error: function(res) {
                    //console.log(res);
                }
            });

        });
    });
</script>
</body>
</html>