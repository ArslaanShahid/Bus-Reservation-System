<?php
require_once("views/header.php");
require_once("models/TicketCancel.php");
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
                                <h2>Cancel Ticket</h2>
                                <a href="index.php">Home</a> <span>/</span>
                                <a class="active" href="#">Cancel Ticket</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section id="contact-main">
        <div class="contact-form">

            <div class="container">
                <h2 class="text-danger">
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
                </h2>
                <div class="row contact-form-area">
                    <div class="col-lg-8 offset-2 contact-form">
                        <form id="c-form" action="process/process_ticket_cancel.php?" method="GET">
                            <div class="row">

                                <div class="col-md-12">
                                    <h5>CNIC</h5>
                                    <input type="" name="cnic" class="form-control" placeholder="Enter CNIC XXXX-XXXXXXX-X " />
                                    <span class="text-danger">
                                        <?php
                                        if (isset($errors['cnic'])) {
                                            echo ($errors['cnic']);
                                        }
                                        ?>
                                    </span>
                                </div>



                                <div class="col-md-12">
                                    <div class="margin-bottom-30"></div>
                                    <button type="submit" class="btn btn-contact btn-continue btn-block">
                                        Check
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--End Body Wrap-->

</body>


<?php
require_once("views/footer.php");
?>