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
                                <h2>Faqs</h2>
                                <a href="<?php echo (BASE_URL); ?>index.php">Home</a> <span>/</span>
                                <a class="active" href="faqs.php">Faqs</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12  accordion1_area">
                                <h3 class="">Frequently asked questions</h3>
                                <div id="accordion">
                                    <h6></h6>
                                    <p>
                                        </h6>
                                </div>
                            </div>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Is registration mandatory to use Smart BRs portal for ticket booking?
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Registration is not a mandatory requirement to book tickets. However, during registration process basic details are captured like username, cnic, email ID, etc. which can Later User for details.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                How can I cancel my ticket? </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">

                                            Ticket can be cancelled online by our website of Smart BRs or by calling on the call center after clearing security questions. Cancellation charges and policy depends on various bus operators individually. Passenger can check the cancellation policy at the time of booking ticket or anytime
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                I have another question, apart from questions answered above.

                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            For more questions and suggestions please be frank to reach us through feedback. Your questions will be answered ASAP by our support team.

                                            If you have other questions please <a href="<?php echo (BASE_URL) ?>contact.php">Click Here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            What are the benefits of online bus booking?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                        Online booking gives ample choice to passenger with regard to bus operators, departure and arrival timings, bus type, etc. Also Can book ticket Online With Payment Method PayPal.

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 newsletter">
                        <div class="n-box">
                           <img src="<?php echo(BASE_URL); ?>assets/images/faq_bus.jpeg" style="width:30rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    require_once('views/footer.php');

    ?>
</body>