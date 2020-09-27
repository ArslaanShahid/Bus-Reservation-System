<?php
// extract($_POST);

// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
// $seats = $_POST['seat_number'];
// $seats = preg_split("/,/",$seats);
// print_r($seats);
// die;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../models/Booking.php";
    $data = $_POST;
    $response = [];
    try {
        $result = Booking::store($data);
        $response['success'] = true;
        $response['booking_id'] = $result;
        $response['msg'] = "Seat Book Successfully";
    } catch(Exception $ex) {
        $response['error']  = true;
        $response['msg'] = $ex->getMessage();
    }
    echo(json_encode($response));
}
?>