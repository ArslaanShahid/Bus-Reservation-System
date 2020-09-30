<?php
session_start();
require_once '../models/CancelTicket.php';
$errors = [];
$obj_query = new TicketCancel();
// echo('<pre>');
// print_r($_POST);
// echo('</pre>');
// die;



try{
    $obj_query->name = $_POST['account_email'];
}catch (Exception $ex){
    $errors['account_email'] = $ex->getMessage();
}


try{
    $obj_query->msg= $_POST['reason'];
}catch(Exception $ex){
    $errors['account_email']= $ex->getMessage();
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
        header("Location:../ticket_cancel_info.php");
    }
}
else{
    $_SESSION ['error'] = "Check your Errors";
    $_SESSION ['errors'] = $errors;
    header("Location:../cancel_ticket_form.php");
}

?>