<?php
session_start();
require_once '../../models/TicketCancel.php';

$result = TicketCancel::getCancelBooking($_GET['id']);

echo(json_encode($result));
