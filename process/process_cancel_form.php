<?php
require_once '../models/TicketCancel.php';
session_start();
$obj_query = new TicketCancel();
$errors = [];
$booking_id = $_POST['booking_id'];
    
try{
    $obj_query->email = $_POST['email'];
}catch (Exception $ex){
    $errors['email'] = $ex->getMessage();
}
try{
    $obj_query->booking_id = $_POST['booking_id'];
}catch (Exception $ex){
    $errors['booking_id'] = $ex->getMessage();
}
try{
    $obj_query->reason= $_POST['reason'];
}catch(Exception $ex){
    $errors['reason']= $ex->getMessage();
}
if(count($errors)==0){
    try{
        $obj_query->SubmitCancelRequest();
        header("Location:../index.php");
        $_SESSION['success']="Your Ticket Cancellation Request has been Sent to our team. We Will Contact You Shortly";
        
    }
    catch(Exception $ex){
        $msg= $ex->getMessage();
        $_SESSION['msg']=$msg;
        header("Location:../cancel_ticket_form.php?id=".$booking_id);
    }
}
else{
    $_SESSION ['error'] = "Check your Errors";
    $_SESSION ['errors'] = $errors;
    header("Location:../cancel_ticket_form.php?id=".$booking_id);
}

?>