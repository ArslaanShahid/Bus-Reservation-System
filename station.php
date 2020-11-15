<?php
require_once('views/header.php');
?>
<!--Start Body Wrap-->

<body class="body-class bc blog">

    <div id="body-wrap">


        <section id="breadcrumb">
            <div class="overly"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 text-center">
                        <div class="breadcrumbinfo">
                            <article>
                                <h2>Near Bus Station</h2>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact-main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="google_map_wrapper">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=bus%20station%20gujranwala&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></a></div>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 500px;
                                        width: 600px;
                                    }

                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 500px;
                                        width: 600px;
                                    }
                                </style>
                            </div>
                        </div>
                        <div class="contact-address">
                            <div class="con-num">
                                <div>
                                </div>
                                <div>
                                    <div class="media">
                                        <i class="fa fa-mobile mr-3"></i>
                                        <div class="media-body">
                                            <h5>Phone</h5>
                                            <a class="d-block" href="javascript:void(0)">
                                                03237553458
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
                                                support@smarbrs.techcodex.net
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

        </section>

    </div>
</body>
<br>
<?php
require_once('views/footer.php');
?>