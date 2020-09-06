<?php
session_start();
require_once '../../models/Admin.php';
$obj_admin = unserialize($_SESSION['obj_admin']);
if(!isset($_SESSION['obj_admin'])){
    $_SESSION['msg']= "You Are Already Logout";
}

try{
    $obj_admin->logout();
    $_SESSION['msg']= "You Are Logout";
    header("Location:../login.php");
}catch(Exception $ex){
    $_SESSION['msg'] = $ex->getMessage();
    header("Location:../index.php");
}

?>