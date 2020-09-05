<?php
include ('header.php');

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
                                <h2>Contact Us</h2>
                                <a href="index.php">Home</a> <span>/</span>
                                <a class="active" href="contact-us.html">Contact Us</a>
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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="google_map_wrapper">
                            <div id="map" data-latitude="23.7500276" data-longitude="90.3869237"></div>
                        </div>
                        <div class="contact-address">
                            <div class="con-num">
                                <div>
                                    <div class="media">
                                        <i class="fa fa-map-marker mr-3"></i>
                                        <div class="media-body">
                                            <h5>Address</h5>
                                            <p>Gujranwala,<br>
                                                Kangni Wala<br>
                                                Punjab Pakistan</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="media">
                                        <i class="fa fa-mobile mr-3"></i>
                                        <div class="media-body">
                                            <h5>Phone</h5>
                                            <a class="d-block" href="javascript:void(0)">
                                                03337777642, 03338184999, 03353111106
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="media mlc">
                                        <i class="fa fa-envelope mr-3"></i>
                                        <div class="media-body">
                                            <h5>Email</h5>
                                            <a class="d-block" href="javascript:void(0)">
                                                info@paklines.pk
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="f-social-links">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <h4>Contact Us</h4>
                                    </div>
                                </div>
                            </div>
                            <form id="c-form" action="https://booking.pak-lines.com/contact-us" method="post">
                                <input type="hidden" name="_token" value="uIxowd2AD7sC7dTNNgQdWhzKaJlfYlg4Naj7Jj7K">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" placeholder="Enter Mail" name="email" value="" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Subject" name="subject" value="" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="3" id="comment" placeholder="Comment" name="message" required> </textarea>
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
        <!--================================
        contact us part end
    =====================================-->

    </div>
<?php
include ('footer.php');

?>


</body>