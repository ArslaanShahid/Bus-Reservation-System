<?php
require_once('init.php');
require_once('views/header.php');

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
                                <h2>About</h2>
                                <a href="<?php echo (BASE_URL); ?>index.php">Home</a> <span>/</span>
                                <a class="active" href="<?php echo (BASE_URL); ?>about.php">About</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-img">
                        <img class="img-fluid" src="assets/images/about-video-image.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>About Us</h3>

                    <h3 class="title" style="font-family: Roboto, serif; line-height: 1.08333; color: rgb(4, 10, 44); margin-top: 20px; margin-bottom: 17px; font-size: 30px; text-transform: uppercase;"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(130, 130, 130); font-family: Raleway; font-size: 14px; text-transform: none;">Smart BRs is a company with an incredible track record of Quality &amp; Excellence in services across the country. Having an excellent history of quarter, a century. From its establishment, the company has making continuous progress to ensure comfort, luxury, safety, time management and best customer support.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(130, 130, 130); font-family: Raleway; font-size: 14px; text-transform: none;">Largest fleet of buses and trailers, having highly professional &amp; trained staff and state of the art technology, Smart BRs is the largest company in Transport &amp; Logistic Industry.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(130, 130, 130); font-family: Raleway; font-size: 14px; text-transform: none;">Uncompromising Quality &amp; Excellence in services is a commitment of<br style="margin-bottom: 0px;">Smart BRs with their prestigious clients.</p></h3>
                </div>
            </div>
        </div>
    </section>
    </div>
    <?php

    require_once('views/footer.php');

    ?>
</body>