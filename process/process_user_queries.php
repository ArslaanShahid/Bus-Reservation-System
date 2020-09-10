<?php
session_start();
require_once '../models/Queries.php';
$errors = [];
$obj_query = new Queries();
// echo('<pre>');
// print_r($_POST);
// echo('</pre>');
// die;



try{
    $obj_query->name = $_POST['name'];
}catch (Exception $ex){
    $errors['name'] = $ex->getMessage();
}
try{
    $obj_query->email = $_POST['email'];
}catch (Exception $ex){
    $errors['email']= $ex->getMessage();
}
try{
    $obj_query->mobile = $_POST['mobile'];
}catch(Exception $ex){
    $errors['mobile']= $ex->getMessage();
}
try{
    $obj_query->msg= $_POST['msg'];
}catch(Exception $ex){
    $errors['msg']= $ex->getMessage();
}
if(count($errors)==0){
    try{
        $obj_query->user_query();
        header("Location:../index.php");
        $_SESSION['success']="Your Message has been Sent to our team. We Will Contact You Shortly";
        
    }
    catch(Exception $ex){
        $msg= $ex->getMessage();
        $_SESSION['msg']=$msg;
        header("Location:../contact.php");
    }
}
else{
    $_SESSION ['error'] = "Check your Errors";
    $_SESSION ['errors'] = $errors;
    header("Location:../contact.php");
}

?>