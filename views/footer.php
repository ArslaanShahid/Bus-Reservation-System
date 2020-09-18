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
<script src="<?php echo (BASE_URL); ?>assets/front/js/jquery.2.1.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--Bootstrap JS-->
<script src="<?php echo (BASE_URL); ?>assets/front/js/bootstrap.min.js"></script>
<!--Counter JS-->
<script src="<?php echo (BASE_URL); ?>assets/front/js/plugins/waypoints.js"></script>
<script src="<?php echo (BASE_URL); ?>assets/front/js/plugins/jquery.counterup.min.js"></script>

<script src="<?php echo (BASE_URL); ?>assets/admin/js/toastr.min.js"></script>
<script src="<?php echo (BASE_URL); ?>assets/admin/js/sweetalert.js"></script>


<script src="<?php echo (BASE_URL); ?>assets/front/js/jquery.autocomplete.js"></script>
<script src="<?php echo (BASE_URL); ?>assets/front/js/flatpickr.js"></script>

<!--Owl Carousel JS-->
<script src="<?php echo (BASE_URL); ?>assets/front/js/plugins/owl.carousel.min.js"></script>
<!--Venobox JS-->
<script src="<?php echo (BASE_URL); ?>assets/front/js/plugins/venobox.min.js"></script>
<!--Slick Slider JS-->
<script src="<?php echo (BASE_URL); ?>assets/front/js/plugins/slick.min.js"></script>
<!--Main-->
<script src="<?php echo (BASE_URL); ?>assets/js/select2.min.js"></script>
<script src="admin/assets/scripts/toastr.min.js"></script>
<script src="<?php echo (BASE_URL); ?>assets/front/js/custom.js"></script>
<script src="<?php echo (BASE_URL); ?>assets/front/js/jquery.seat-charts.min.js"></script>

<script>
    let ajax_loader = "<img src='assets/images/ajax-loader.gif' alt='logo' width='30'>";

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
    function validate(data, actions) {
        let i = 0;
        $(".has_error").html(" ");
        if (data.booking_date == '') {
            toastr.error("Missing Booking Date");
            i++;
        }
        if (data.route_id == '') {
            toastr.error("Opps Something Went Wrong");
            i++;
        }
        if (data.name == '') {
            $(".name").html("Missing Name");
            i++;
        }
        if (data.gender == '') {
            $(".gender_error").html("Missing Gender");
            i++;
        }
        if (data.contact_no == '') {
            $(".contact_no").html("Missing Contact No");
            i++;
        }
        if (data.cnic == '' || data.cnic.length < 13) {
            $(".cnic").html("Missing CNIC Must Be 12 Numbers");
            i++;
        }
        if (data.seat_number == '') {
            i++;
            toastr.error("Please Select Seat");
        }
        if (i > 0) {
            toastr.error("Fill all the Required Fields");
            return true;
        }
        return false;
    }
    $(document).ready(function() {

        $('.boarding_point').select2();
        $("#searchDate").datepicker({
            minDate: 0,
            maxDate: "+1M",
            dateFormat: "yy-mm-dd"
        });
        $("#searchDate").datepicker("setDate", new Date());
        // $("#searchDate").datepicker({ minDate: -20, maxDate: "+1M +10D" });


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
                seatSerial += $(this).text().trim() + ",";
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

        var allData;
        $("#bookingForm").submit(function(e) {
            e.preventDefault();
            var trip_route_id = $("input[name=trip_route_id]").val();
            var total_seat = $("input[name=total_seat]").val();
            var seat_number = $("input[name=seat_number]").val();
            var price = $("input[name=price]").val();
            var total_fare = $("input[name=total_fare]").val();
            var booking_date = $("input[name=booking_date]").val();
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
            };
            $.ajax({
                type: "post",
                url: "<?php echo (BASE_URL); ?>process/process_booking.php",
                data: data,
                dataType: 'JSON',
                beforeSend: function(xhr) {
                    $(".loader").html(ajax_loader);
                },
                complete: function(jqXHR, textStatus) {
                    if (jqXHR.status == 200) {
                        let result = JSON.parse(jqXHR.responseText);
                        if (result.hasOwnProperty('success')) {
                            window.location.href = "view_ticket.php";
                            toastr.success("Seats Reserve Successfully");
                            $(".loader").html('');
                        }
                    } else {
                        toastr.error("Opps Something Went Wrong Contact Admin");
                    }
                }

            });

        });
    });
</script>
</body>

</html>