<?php
session_start();

require_once '../models/user.php';
if(!isset($_SESSION['obj_user'])){
    header("Location:". BASE_URL."login.php");
}
$obj_user = unserialize($_SESSION['obj_user']);
if($_SERVER['REQUEST_METHOD'] == "POST")  {
    $errors = [];
    try{
        $obj_user->password_validate($_POST['old_password']);
    } catch (Exception $ex) {
        $errors['old_password'] = $ex->getMessage();
    }
    try{
        $obj_user->password_validate($_POST['new_password']);
    } catch (Exception $ex) {
        $errors['new_password'] = $ex->getMessage();
    }
    try{
        $obj_user->confirm_password($_POST['new_password'],$_POST['confirm_password']);
    }catch (Exception $ex){
        $errors['confirm_password'] = $ex->getMessage();
    }

    if(count($errors) == 0){
        try{
            $obj_user->update_password($_POST['old_password'], $_POST['new_password']);
            $_SESSION['msg'] = "Password Update Successfully";
            header("Location:". BASE_URL."msg.php");
        }catch (Exception $ex){
            $_SESSION['msg'] = $ex->getMessage();
            header("Location:". BASE_URL."change_password.php");
        }
    }else {
        $_SESSION ['errors'] = $errors;
        header("Location:". BASE_URL."change_password.php");
    }
}
