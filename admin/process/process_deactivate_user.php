<?php
session_start();
require_once '../../models/user.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['id'])){
    try{
        user::deactivateAccount($_GET['id']);
        $_SESSION['info'] = 'User Account Deactivated !';
        header("Location:../view_registered_users.php");
    }catch(Exception $ex){
      
    }
}

?>