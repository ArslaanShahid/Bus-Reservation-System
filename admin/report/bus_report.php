<?php
require_once "../../models/Bus.php";
require_once "views/header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Bus No</td>
            <td>Bus Type</td>
            <td>Seats</td>

        </tr>
    </thead>
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
        echo ("</tr>");
        $i++;
    }
    ?>

</table>
<?php
require_once "views/footer.php";
?>