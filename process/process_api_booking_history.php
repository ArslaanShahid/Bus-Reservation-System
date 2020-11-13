<?php
    require_once "../models/Booking.php";
$response = [];
try {
    $BookingHistory = Booking::Api_bookingHistory($_GET['cnic']);
    $response['success'] = true;
    $response['history'] = $BookingHistory;
} catch(Exception $ex) {
    $response['error']  = true;
    $response['msg'] = $ex->getMessage();
}
echo(json_encode($response));
    