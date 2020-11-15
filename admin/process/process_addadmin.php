<?php
session_start();
require_once '../../models/Admin.php';
require_once '../init.php';
$obj_admin = new Admin();
$errors = [];
try {
    $obj_admin->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}
try {
    $obj_admin->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}
try {
    $obj_admin->email = $_POST['email'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}
if (count($errors) == 0) {
    try {
        $obj_admin->addAdmin();
        $_SESSION['success'] = "Account Has Been Created Successfully";
        header("Location:". BASE_URL."addadmin.php");
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
        $_SESSION['error'] = $msg;
        header("Location:". BASE_URL."addadmin.php");
    }
} else {
    $msg = "Check Your Errors";
    $_SESSION['error'] = $msg;
    $_SESSION['errors'] = $errors;
    // $_SESSION['obj_admin'] = serialize($obj_admin);
    header("Location:". BASE_URL."addadmin.php");
}