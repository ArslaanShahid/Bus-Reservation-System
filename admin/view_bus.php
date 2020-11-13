<?php
require_once '../models/Bus.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>
<div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-bus">
                        </i>
                    </div>
                    <div>Manage Bus
                        <div class="page-title-subheading">View Buses
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col-lg-12  mt-5">

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"> </h5>

            <table class="table table-striped table-bordered" id="account" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Bus No</th>
                        <th>Bus Type</th>
                        <th>Seats</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i = 1;
                    $buses = Bus::allBuses();
                    foreach ($buses as $bus) {
                        echo ("<tr>");
                        echo ("<td>" . $i . "</td>");
                        echo ("<td>" . $bus->bus_no . "</td>");
                        if ($bus->air_conditioner == 1) {
                            echo ("<td>" . "AC" . "</td>");
                        } else {
                            echo ("<td>" . "Non-AC" . "</td>");
                        }

                        echo ("<td>" . $bus->seats . "</td>");
                        echo ("<td><a href='".BASE_URL."process/process_delete_bus.php?id=".$bus->id."' class='text-danger offset-5 fa fa-trash'></a></td>");

                        echo ("</tr>");
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
require_once 'views/footer.php';
?>