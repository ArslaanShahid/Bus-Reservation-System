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
// use PHPMailer\PHPMailer\PHPMailer;
// require "../vendor/autoload.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../models/Booking.php";
    $data = $_POST;
    $response = [];
    try {
        $result = Booking::store($data);
        $response['success'] = true;
        $response['result'] = $result;


        // $mail = new PHPMailer(true);
        // $mail->isSMTP();
        // $mail->Host = 'smtp.mailtrap.io';
        // $mail->Port = 2525;
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = 'tls';
        // $mail->Username   = '03205e84f3a9a5';
        // $mail->Password   = 'c80952ed2e05f3';

        // $mail->setFrom('smartbrs@techcodex.net', 'SmartBRS');
        // $mail->addAddress('furqan@gmail.com', 'Furqan');

        // // Content
        // $mail->isHTML(true);
        // $mail->Subject = 'Booked Ticket No.';
        // $mail->Body    = '<center><h1>Smart BRS </h1>'
        //                 .'<h2>Thank you for choosing our Service.</h2>'
        //                 .'<h2>This is your Ticket Number:'.$result['ticket_id'].'</h2></center>';

        // $mail->send();

        $response['msg'] = "Seat Book Successfully";

    } catch(Exception $ex) {
        $response['error']  = true;
        $response['msg'] = $ex->getMessage();
    }
    echo(json_encode($response));
}
?>