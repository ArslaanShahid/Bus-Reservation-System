<?php
session_start();
require_once '../models/Employee.php';
$obj_emp = new Employee();
$errors = [];

// die($_POST['gender']);


try {
    $obj_emp->name = $_POST['name'];
} catch (Exception $ex) {
    $errors['name'] = $ex->getMessage();
}
try {
    $obj_emp->address = $_POST['address'];
} catch (Exception $ex) {
    $errors['address'] = $ex->getMessage();
}
try {
    $obj_emp->type = $_POST['type'];
} catch (Exception $ex) {
    $errors['type'] = $ex->getMessage();
}
try {
    $obj_emp->mobile_no = $_POST['mobile_no'];
} catch (Exception $ex) {
    $errors['mobile_no'] = $ex->getMessage();
}
// try {
//     $obj_emp->date_of_birth = $_POST['date_of_birth'];
// } catch (Exception $ex) {
//     $errors['date_of_birth'] = $ex->getMessage();
// }
try {
    $gender = isset($_POST['gender']) ? $_POST['gender'][0] : '';
    $obj_emp->gender = $gender;
} catch (Exception $ex) {
    $errors['gender'] = $ex->getMessage();
}

if (count($errors) == 0) {
    try {
        $obj_emp->addEmp();
        $_SESSION['success'] = "Employee Account Has Been Added";
        header("Location:../employee.php");
    } catch (Exception $ex){
        $msg = $ex->getMessage();
        $_SESSION['error'] = $msg;
        header("Location:../employee.php");
    }
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    header("Location:../employee.php");
}
