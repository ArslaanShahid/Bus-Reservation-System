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
                                <h2>Faqs</h2>
                                <a href="index.html">Home</a> <span>/</span>
                                <a class="active" href="faqs.html">Faqs</a>
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

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 newsletter">
                        <div class="n-box">
                            <div class="overly"></div>
                            <article>
                                <h4>Sign up for</h4>
                                <h3>Our Newsletter</h3>

                                <form action="https://booking.pak-lines.com/subscribe" method="post">
                                    <input type="hidden" name="_token" value="uIxowd2AD7sC7dTNNgQdWhzKaJlfYlg4Naj7Jj7K"> <input type="email" name="email" value="" class="mamunur_rashid_form" placeholder="Your Email Address" required>
                                    <button type="submit" class="mamunur_rashid_form mr-btn">SUBSCRIBE</button>
                                </form>

                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

include ('footer.php');

?>
</body>