<?php
session_start();
require_once('../init.php');
require_once'../models/user.php';
$errors = [];

// die($_POST['city_id']);



if(isset($_SESSION['obj_user'])){
    header("Location:../index.php");
}
$obj_user = unserialize($_SESSION['obj_user']);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    try{
        $obj_user->first_name = $_POST ['first_name'];
    }catch (Exception $ex){
        $errors['first_name'] = $ex->getMessage();
    }
    try{
        $obj_user->last_name = $_POST ['last_name'];
    }catch (Exception $ex){
        $errors ['last_name'] = $ex->getMessage();
    }
    // try {
    //     $obj_user->email = $_POST ['email'];
    // }catch(Exception $ex){
    //     $errors ['email'] = $ex->getMessage();
    // }
    try{
        $obj_user->mobile_no = $_POST ['mobile_no'];
    }catch(Exception $ex) {
        $errors['mobile_no']  = $ex->getMessage();
    }
    try{
        $obj_user->date_of_birth = $_POST['date_of_birth'];
    }catch (Exception $ex){
        $errors ['date_of_birth'] =$ex->getMessage();
    }
    try {
        $gender = isset($_POST['gender']) ? $_POST['gender'][0] : '';
        $obj_user->gender = $gender;
    }catch (Exception $ex){
        $errors ['gender'] = $ex->getMessage();
    }
    try{
        $obj_user->state_id = $_POST['state_id'];
    } catch (Exception $ex) {
        $errors['state_id'] = $ex->getMessage();
    }
    try{
        $obj_user->city_id = $_POST['city_id'];
    } catch (Exception $ex) {
        $errors['city_id'] = $ex->getMessage();
    }
    if(count($errors) == 0){
        try {
            $obj_user->update();
            $_SESSION['success'] = "Account Updated Successfully";
            header("Location:". BASE_URL."update_account.php");
        }catch(Exception $ex){
            $msg = $ex->getMessage();
            $_SESSION['msg'] = $msg;
            header ("Location:". BASE_URL."update_account.php");
        } 
    
    }else{
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors']= $errors;
        header("Location:". BASE_URL."update_account.php");
        
    }
    
}
