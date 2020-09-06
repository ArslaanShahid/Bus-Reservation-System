<?php
session_start();
require_once '../../models/Admin.php';
$errors = [];
$obj_admin = new Admin();
// die($_POST['password']);
// die($_POST['status']);

try{
    $obj_admin->user_name = $_POST['user_name'];
}
catch(Exception $ex){
    $errors['user_name'] = $ex->getMessage();
}
try {
    $obj_admin->password = $_POST['password'];
}
catch(Exception $ex){
    $errors['password'] = $ex->getMessage();
}
try{
    $obj_admin->status =$_POST['status'];
}catch(Exception $ex){
    $errors['status'] = $ex->getMessage();
}
if(count($errors)==0){
    try{
        $obj_admin->login();
        header("Location:../index.php");
    }
    catch(Exception $ex){
        $msg=$ex->getMessage();
        $_SESSION['msg'] = $msg;
        header("Location:../login.php");
    }
}
else{
    $_SESSION['msg'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    header("Location:../login.php");
}
