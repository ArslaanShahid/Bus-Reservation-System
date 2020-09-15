<?php
session_start();
require_once '../../models/Booking.php';

$result = Booking::getRoute($_GET['id']);

echo(json_encode($result));
?>