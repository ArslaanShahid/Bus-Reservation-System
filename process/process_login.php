<?php
session_start();
require_once '../models/user.php';
$errors = [];
$obj_user = new User();
// die($_POST['user_name']);
// die($_POST['password']);


try {
    $obj_user->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}
try{
    $obj_user->password = $_POST['password'];
}catch (Exception $ex){
    $errors['password'] = $ex->getMessage();
}
if(count($errors)==0){
    try{
        $obj_user->login();
        header("Location:../index.php");
    }
    catch(Exception $ex){
    $msg= $ex->getMessage();
    $_SESSION['msg']=$msg;
    header("Location:../login.php"); 
    }
    
}
else {
    $_SESSION ['msg']= "Check Your Errors";
    $_SESSION ['errors'] = $errors;
    header("Location:../login.php");
}
