<?php
session_start();
require_once '../models/Admin.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['id'])){
    try{
        Admin::deactivateAccount($_GET['id']);
        $_SESSION['info'] = 'Admin Deactivated !';
        header("Location:../account.php");
    }catch(Exception $ex){
      
    }
}

?>