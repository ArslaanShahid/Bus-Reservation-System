
<?php
require_once ('../init.php');
require_once ('../models/Booking.php');
date_default_timezone_get("Asia/Karachi");
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    session_start();
    $current_date = date("Y-m-d");
    $unique_id = $_GET['unique_id'];
    $result = Booking::PrintTicket($_GET['unique_id']);
    $date =date('Y-m-d',strtotime($result['unique_id']->date));
    $ticket_date = ($result['booking']->date);
    
    if($ticket_date < $current_date){
        $_SESSION ['error'] = 'Your Ticket is Expire Or Enter 5 Digit Valid Ticket No';
        header("Location:". BASE_URL."print_download.php");
        die;
    }
     if($unique_id == "" || $unique_id <4 || $unique_id <6){
        $_SESSION ['error'] = 'Please Enter Enter 5 Digit Valid Ticket No ';
        header("Location:". BASE_URL."print_download.php");
    }
    
    else{
        header("Location:". BASE_URL."ticket_download.php?unique_id=".$unique_id);
    }

}

?>