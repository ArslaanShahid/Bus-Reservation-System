<?php
session_start();
require_once '../../models/Admin.php';
require_once '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['id'])){
    try{
        Admin::deactivateAccount($_GET['id']);
        $_SESSION['info'] = 'Admin Deactivated !';
        header("Location:". BASE_URL."account.php");
    }catch(Exception $ex){
      
    }
}

?>