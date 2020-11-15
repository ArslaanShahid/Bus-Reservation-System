<?php
require_once '../models/Route.php';
require_once '../models/Bus.php';
require_once '../models/Location.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';


// $result = Location::allCities();
// echo("<pre>");
// print_r($result);
// echo("</pre>");
// die;
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon fa fa-line-chart">
                </i>
            </div>
            <div>Reports / Admin Reports
                <div class="page-title-subheading">Weekly / Monthly Reports / DateWise
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-2 offset-3">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <span>
                    <?php

                    if (isset($_SESSION['msg'])) {
                        echo ($_SESSION['msg']);
                        unset($_SESSION['msg']);
                    }
                    if (isset($_SESSION['errors'])) {
                        $errors = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    }
                    ?>
                </span>
                <h5 class="card-title">Report Type </h5>
                <div class="form-group <?php if (isset($errors['user_name'])) {
                                            echo ("has-error");
                                        } ?>">
                    <div class="position-relative form-group">
                        <select name="select" id="report" class="form-control">
                            <option value="0">--Select Report--</option>
                            <option value="1">1. Bus Report</option>
                            <option value="2">2. Daily Booking Report</option>
                            <option value="3">3. Employees Report</option>
                            <option value="4">4. Weekly Booking Report</option>
                            <option value="5">5. Monthly Booking Report</option>
                            <option value="6">6. Date Wise Booking Report</option>
                            <option value="7">7. Cancel Booking Refund</option>
                            <option value="8">8. Date Wise Cancel Booking Report</option>
                            <option value="9">9. Daily Route Report</option>
                            <option value="10">10.Weekly Route Report</option>
                            <option value="11">11.Monthly Route Report</option>
                            <option value="12">12.Bus Wise Booking Report</option>
                            <option value="13">13.Weekly Sale Report</option>
                            <option value="14">14.Pending Cancel Booking Report</option>
                            <option value="15">15.Date Wise Pending Cancel Booking Report</option>
                            <option value="16">16.City Wise Booking Report</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="data">

</div>
<?php
require_once 'views/footer.php';
?>
<script>
    $(document).ready(function(e) {
        $("#report").change(function(e) {
            var val = $(this).val();
            if (val == 1) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/bus_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 2) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/daily_booking_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 3) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/employees_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 4) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/weekly_booking_report.php' method='post'>";
                output += "<div class='form-group' >";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 5) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/monthly_booking_report.php' method='post'>";
                output += "<div class='form-group' >";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 6) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/date_wise_report.php' method='post'>";
                output += "</div>";
                output += "<div class='form-group' >";
                output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
                output += "<div class='col-md-10'>";
                output += "<input type='date' class='form-control date weekly_from_date' name='from_date' style='margin-top:10px;'>"
                output += "</div>";
                output += "</div>"
                output += "<div class='form-group' >";
                output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
                output += "<div class='col-md-10'>";
                output += "<input type='date' class='form-control date weekly_to_date' name='to_date' style='margin-top:10px;'>"
                output += "</div>";
                output += "</div>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 7) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/cancel_booking_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 8) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/date_wise_cancel_booking.php' method='post'>";
                output += "</div>";
                output += "<div class='form-group' >";
                output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
                output += "<div class='col-md-10'>";
                output += "<input type='date' class='form-control date weekly_from_date' name='from_date' style='margin-top:10px;'>"
                output += "</div>";
                output += "</div>"
                output += "<div class='form-group' >";
                output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
                output += "<div class='col-md-10'>";
                output += "<input type='date' class='form-control date weekly_to_date' name='to_date' style='margin-top:10px;'>"
                output += "</div>";
                output += "</div>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 9) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/daily_route_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 10) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/weekly_route_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            } else if (val == 11) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/monthly_route_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            }
            else if (val == 12) {
                var output = "";
            output += "<form action='<?php echo (BASE_URL); ?>reports/bus_wise_booking_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select Bus</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' name='bus_id'>";
            output += "<option value=''>--Select Bus--</option>";
            output += "<?php $buses = Bus::allBuses();foreach($buses as $bus) { echo("<option value='".$bus->id."'>".ucfirst($bus->bus_no)."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_from_date' name='from_date' style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_to_date' name='to_date' style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>";
            output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
            output += "</form>";
            $(".data").html(output);
            }
            else if (val == 13) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/weekly_sale_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            }
            else if (val == 14) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/cancel_pending_report.php' method='post'>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            }else if (val == 15) {
                var output = "";
                output += "<form action='<?php echo (BASE_URL); ?>reports/date_wise_pending_cancel_booking.php' method='post'>";
                output += "</div>";
                output += "<div class='form-group' >";
                output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
                output += "<div class='col-md-10'>";
                output += "<input type='date' class='form-control date weekly_from_date' name='from_date' style='margin-top:10px;'>"
                output += "</div>";
                output += "</div>"
                output += "<div class='form-group' >";
                output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
                output += "<div class='col-md-10'>";
                output += "<input type='date' class='form-control date weekly_to_date' name='to_date' style='margin-top:10px;'>"
                output += "</div>";
                output += "</div>";
                output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
                output += "</form>";
                $(".data").html(output);
            }
            else if (val == 16) {
            var output = "";
            output += "<form action='<?php echo (BASE_URL); ?>reports/city_wise_booking.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select City</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' id='cities' name='city_id'>";
            output += "<option value=''>--Select City--</option>";
            output += "<?php $cities = Location::allCities(); foreach($cities as $city) { echo("<option value='".$city->id."'>".($city->name)."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_from_date' name='from_date' style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_to_date' name='to_date' style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>";
            output += "<center><input type='submit' value='Show Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'></center>";
            output += "</form>";
            $(".data").html(output);
            $('#cities').select2();
            }

        });
   
        //monthly dates
        var date = new Date();
        var month = date.getMonth();
        var fullDate = date.getDate();

        if (month < 13)
            month = month + 1;
        var fromMonth = month - 1;

        if (month < 10) {
            fromMonth = '0' + fromMonth;
            month = '0' + month;
        }

        if (fullDate < 10) {
            fullDate = '0' + fullDate;
        }
        $(document).on('change', '#report', function(e) {
            $(".monthly_to_date").val(date.getFullYear() + "-" + month + "-" + fullDate);
            $(".monthly_from_date").val(date.getFullYear() + "-" + fromMonth + "-" + fullDate);
        });

        //weekly dates
        var days = 7; // Days you want to subtract
        var date = new Date();
        var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
        var day = last.getDate();
        var m = last.getMonth() + 1;
        if (m < 10)
            m = '0' + m;
        if (day < 10)
            day = '0' + day;
        var year = last.getFullYear();

        $(document).on('change', '#report', function(e) {
            $(".weekly_from_date").val(year + "-" + m + "-" + day);
            $(".weekly_to_date").val(date.getFullYear() + "-" + month + "-" + fullDate);
        });

    });
   
</script>