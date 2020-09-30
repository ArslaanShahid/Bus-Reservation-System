<?php
session_start();
require_once '../../models/TicketCancel.php';

$error = '';

try{
    TicketCancel::cancelTicket($_GET['booking_id'] , $_GET['id']);
}catch(Exception $ex){
    $error = $ex->getMessage();
}

if(!$error)
{
    $_SESSION['success'] = "Ticket Cancelled";
    header("Location:../cancel_booking.php");

}else{
    $_SESSION['error'] = $error;
    header("Location:../cancel_booking.php");
}