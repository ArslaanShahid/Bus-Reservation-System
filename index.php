<?php
require_once('views/header.php');
require_once('models/Location.php');
$cities = Location::allCities();
?>

<!-- =========== nav end =========== -->
<div id="banner">
    <div class="overly"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-10 text-center banner_slider">
                <div class="banner_info">
                    <article>
                        <h4>Let&#039;s Go Together</h4>
                        <h2>Smart Bus Reservation System</h2>
                        </h2>
                        <p></p>
                    </article>

                </div>
            </div>
        </div>

        <div class="row b-serch">
            <div class="col-12">
                <div class="h-seaerch-area">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show normal active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="process/process_search.php?" method="GET">
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <select class="form-control" name="departure" id="departure" required>
                                            <option disabled selected value="">Select Departure City</option>
                                            <?php
                                            foreach ($cities as $city) {
                                                echo ("<option value='" . $city->id . "'>" . $city->name . "</option>");
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="arrival" id="arrival" required>
                                            <option disabled selected value="">Select Arrival City</option>
                                            <?php
                                            foreach ($cities as $city) {
                                                echo ("<option value='" . $city->id . "'>" . $city->name . "</option>");
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" name="date" id="datetimepicker2" class="form-control" placeholder="Date" required>
                                    </div>

                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary btn-lg  h-serch mamunur_rashid_form_sm">
                                            SEARCH </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========== banner end =========== -->

<!-- =========== Why Choose Us Start ============ -->
<section id="choose-us">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">

                <?php
                if (isset($_SESSION['obj_user'])) {
                    echo ("<h1 class='text-success'>
                    Welcome Back!");
                    echo ($obj_user->user_name);
                }

                ?>
                </h1>
                <hr>
                <br>
                <br>
                <h2 class="section-heading">Why Choose Us</h2>
                <p class="section-paragraph">PAK LINES is a company with an incredible track record of Quality &amp; Excellence in services across the country.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="c-box text-center">
                    <div class="icon">
                        <i class="fa fa-glass" aria-hidden="true"></i>
                    </div>
                    <h4>Refreshments</h4>
                    <p>Pak Line serves you healthy refreshments</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="c-box text-center">
                    <div class="icon">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </div>
                    <h4>Non Stop</h4>
                    <p>Pak Lines are based on direct routing ( NONE STOP Service)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="c-box text-center">
                    <div class="icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <h4>Trained Staff</h4>
                    <p>Pak Lines have professionally trained and experienced staff to serve you better</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="c-box text-center">
                    <div class="icon">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                    </div>
                    <h4>Security Guards</h4>
                    <p>We have the service of well trained security guards to ensure the security.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========== Whay Choose Us End ============ -->


<!-- =========== Popular Tours Start ============= -->

<section id="popular_turs">
    <div class="overly"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <h2 class="section-heading">Popular Tour Packages</h2>
                <p class="section-paragraph">We provide you very comfortable and luxury style including seats, facilities like Air Conditioning, WI-FI, And refreshments</p>
            </div>
        </div>
        <div class="row tur-slider">
        </div>
    </div>
</section>
<!-- =========== Popular Tours end ============= -->

<!-- =============== popular Destinations Start ================= -->
<section id="popular_destinations">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <h2 class="section-heading">Popular Destinations</h2>
                <p class="section-paragraph">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form injected humour.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 p-0 mr-px-15">
                <div class="c-box">
                    <div class="img">
                        <img class="img-fluid" src="assets/images/tour/destination_1562260930.jpg" alt="...">
                    </div>
                    <article>
                        <div class="footer d-flex justify-content-between">
                            <div>
                                <span><i class="fa fa-map-marker"></i> Faisalabad</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =============== popular Destinations End ================= -->


<!-- =============== Latest News Area Start ============================ -->
<section id="latest_news">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <h2 class="section-heading">Latest News</h2>
                <p class="section-paragraph">Largest fleet of buses and trailers, having highly professional &amp; trained staff and state of the art technology, PAK LINES is the largest company in Transport &amp; Cargo Industry.</p>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</section>
<!-- =============== Latest News Area End ============================ -->




<!---=========================== Start Enquiry  =============================--->
<section id="contact-main">

    <div class="contact-form-area-padding">
        <div class="container">
            <div class="row contact-form-area">
                <div class="col-lg-6">
                    <div class="img">

                    </div>
                </div>
                <div class="col-lg-6 contact-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-block-form">
                                <h4>Enquiry</h4>
                                <p>Largest fleet of buses and trailers, having highly professional &amp; trained staff and state of the art technology, PAK LINES is the largest company in Transport &amp; Cargo Industry. </p>
                            </div>
                        </div>
                    </div>
                    <form id="c-form" action="https://booking.pak-lines.com/enquiry" method="post">
                        <input type="hidden" name="_token" value="uIxowd2AD7sC7dTNNgQdWhzKaJlfYlg4Naj7Jj7K">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="">
                            </div>
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Enter Your Mail" name="email" value="">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="3" id="comment" placeholder="Enquiry" name="enquiry"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-contact">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

include('views/footer.php');

?>