<?php
session_start();
require_once('../init.php');
require_once '../models/user.php';
$obj_user = unserialize($_SESSION['obj_user']);
if(!isset($_SESSION['obj_user'])) {
    $_SESSION['msg'] = "You are Already Logout";
}

try{
    $obj_user->logout();
    $_SESSION['msg'] = "Your Are Logout";
    header("Location:". BASE_URL."login.php");
} catch (Exception $ex) {
    $_SESSION['msg'] = $ex->getMessage();
    header("Location:". BASE_URL."index.php");
}
?>