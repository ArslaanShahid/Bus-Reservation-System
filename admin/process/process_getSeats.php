<?php
session_start();
require_once '../../models/Booking.php';

$result = Booking::getSeats($_GET['id']);
echo(json_encode($result));

?>
