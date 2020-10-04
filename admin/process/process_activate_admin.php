<?php
session_start();
require_once '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['id'])){
    try{
        Admin::activateAccount($_GET['id']);
        $_SESSION['success'] = 'Admin Activated !';
        header("Location:". BASE_URL."account.php");
    }catch(Exception $ex){

    }
}

?>