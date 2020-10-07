
<?php
require_once ('../init.php');
require_once ('../models/Booking.php');
date_default_timezone_get("Asia/Karachi");
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    session_start();
    $current_date = date("Y-m-d");
    $booking_id = $_GET['booking_id'];
    $result = Booking::getTicketInfo($_GET['booking_id']);
    $date =date('Y-m-d',strtotime($result['booking']->date));
    // print_r($date);
    // die;
    $booking_date = $result=Booking::getTicketInfo($_GET['date']);
    if($date < $current_date){
        $_SESSION ['error'] = 'Ticket Not Found Please Try Again With Valid Ticket No';
        header("Location:". BASE_URL."print_download.php");
    }
    else if(!is_numeric($booking_id) || ""){
        $_SESSION ['error'] = 'Please Enter Valid Ticket No ';
        header("Location:". BASE_URL."print_download.php");
    }
    
    else{
        header("Location:". BASE_URL."view_ticket.php?booking_id=".$booking_id);
    }

}

?>