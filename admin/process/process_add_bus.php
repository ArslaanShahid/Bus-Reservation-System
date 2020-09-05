<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
// echo('<pre>');
// print_r($_POST);
// echo('</pre>');
// die;
session_start();
require_once '../../models/Bus.php';
$obj_bus = new Bus();
$errors = [];

try{
    $obj_bus->bus_no = $_POST['bus_no'];
}catch (Exception $ex){
    $errors['bus_no'] = $ex->getMessage();
}

try {
    $air_conditioner = isset($_POST['air_conditioner']) ? $_POST['air_conditioner'][0] : '';
    $obj_bus->air_conditioner = $air_conditioner;
} catch (Exception $ex) {
    $errors['air_conditioner'] = $ex->getMessage();
}
try {
    $obj_bus->seats = $_POST['seats'];
}catch (Exception $ex) {
    $errors['seats'] = $ex->getMessage();
}

if(count($errors) == 0 ){
    try{
        $obj_bus->addBus();
        $_SESSION['success'] = "Bus Added Successfully";
        header("Location:../bus.php");
            }        
        catch (Exception $ex){
        $msg = $ex->getMessage();
        $_SESSION['error'] = $msg;
        header("Location:../bus.php");
}
}
else {
    $_SESSION['error']= "Check Your Errors";
    $_SESSION['errors']= $errors;

    header("Location:../bus.php");
}
}