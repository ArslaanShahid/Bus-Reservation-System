<?php
    require_once "../models/Booking.php";
$response = [];
try {
    $ticket = Booking::PrintTicket($_GET['unique_id']);
    $response['success'] = true;
    $response['routes'] = $ticket;
} catch(Exception $ex) {
    $response['error']  = true;
    $response['msg'] = $ex->getMessage();
}
echo(json_encode($response));
