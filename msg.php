<?php
require_once 'views/header.php';

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
                                <h2>Success Message</h2>
                                <a href="index.php">Home</a> <span>/</span>
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
                <div class="row contact-form-area">
                    <div class="col-lg-8 offset-2 contact-form">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo ('<h2 class="col-md-offset-4 alert-success">' . $_SESSION['msg'] . '</h2>');
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
<?php
require_once 'views/footer.php';
?>