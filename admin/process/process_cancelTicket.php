<?php
session_start();
require_once '../../models/TicketCancel.php';
require_once '../init.php';
// $ticket =TicketCancel::cancelTicket($_GET['booking_id'], $_GET['id']);
// echo('<pre>');
// print_r($ticket);
// echo('</pre>');
// die; 
$error = '';

try{
        TicketCancel::cancelTicket($_GET['booking_id'], $_GET['id']);
  
}catch(Exception $ex){
    $error = $ex->getMessage();
}

if(!$error)
{
    $_SESSION['success'] = "Ticket Cancelled";
    header("Location:". BASE_URL."cancel_booking.php");

}else{
    $_SESSION['errors'] = $errors;
    header("Location:". BASE_URL."cancel_booking.php");
}