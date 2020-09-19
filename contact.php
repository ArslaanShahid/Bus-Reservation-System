<?php
require_once ('views/header.php');
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
                                <h2>Contact Us</h2>
                                <a href="<?php echo (BASE_URL); ?>index.php">Home</a> <span>/</span>
                                <a class="active" href="<?php echo (BASE_URL); ?>contact.php">Contact Us</a>
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
                            <p class="text-danger">
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

                            </p>
                        </div>
                    </div>
                </div>
                <form id="c-form" action="<?php echo (BASE_URL); ?>process/process_user_queries.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
                            <span class="text-danger"><?php
                                    if (isset($errors['name'])) {
                                        echo ($errors['name']);
                                    }

                                    ?></span>
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control" placeholder="Enter Your Mail" name="email" >
                            <span class="text-danger"><?php
                                    if (isset($errors['email'])) {
                                        echo ($errors['email']);
                                    }

                                    ?></span>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Phone Number" name="mobile">
                            <span class="text-danger"><?php
                                    if (isset($errors['mobile'])) {
                                        echo ($errors['mobile']);
                                    }

                                    ?></span>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="3"  placeholder="Enquiry" name="msg"></textarea>
                            <span class="text-danger"><?php
                                    if (isset($errors['msg'])) {
                                        echo ($errors['msg']);
                                    }

                                    ?></span>
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
    </body>
<?php
require_once ('views/footer.php');
?>