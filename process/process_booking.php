<?php
// extract($_POST);

// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
$seats = $_POST['seat_number'];
$seats = preg_split("/,/",$seats);
print_r($seats);
die;
?>