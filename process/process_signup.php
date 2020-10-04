<?php
require_once '../models/user.php';
require_once ('../init.php');
session_start();

$obj_user = new User();
$errors = [];

// // die($_POST['password']);
// die($_POST['last_name']);
// die($_POST['cnic']);


try {
    $obj_user->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}
try {
    $obj_user->email = $_POST['email'];
} catch (Exception $ex) {
    $errors['email'] = $ex->getMessage();
}
try {
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}
try {
    $obj_user->cnic = $_POST['cnic'];
} catch (Exception $ex) {
    $errors['cnic'] = $ex->getMessage();
}
if(count($errors)==0){
    try{
        $obj_user->signup();
        $msg= "Congratulations You're Signup";
        $_SESSION ['msg'] = $msg;
        header("Location:". BASE_URL."msg.php");
    }catch(Exception $ex){
        $msg = $ex->getMessage();
        $_SESSION['msg']= $msg;
        header("Location:". BASE_URL."register.php");
    }
}
else {
    $msg= "Check Your Errors";
    $_SESSION['msg']= $msg;
    $_SESSION['errors']= $errors;
    $_SESSION['obj_user']= serialize($obj_user);
    header("Location:". BASE_URL."register.php");
}


?>