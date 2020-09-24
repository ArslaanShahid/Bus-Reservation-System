<?php
require_once('models/user.php');
require_once('views/header.php');
require_once('models/Route.php');
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
                                <h2>Booking History</h2>
                                <a href="index.php">Home</a> <span>/</span>
                                <a class="active" href="#">Booking History</a>
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
            <div class=" text-center">
                <h1 class="text-center mb-4">Booking History Detail</h1>
            </div>
            <div class="contact-form">
                <div class="container">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <th>Operator/Bus</th>
                                <th>Departure</th>
                                <th>Duration</th>
                                <th>Name</th>
                                <th>Arrival</th>
                                <th>Total Seats</th>
                                <th>Bus Type</th>
                                <th>Fare</th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!--================================
        contact us part end
    =====================================-->

    </div>
    <!--End Body Wrap-->

</body>

<?php
require_once('views/footer.php');
?>