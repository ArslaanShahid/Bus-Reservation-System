<?php
session_start();
require_once '../../models/Employee.php';
require_once '../init.php';

Employee::DeleteEmp($_GET['id']);
$_SESSION['success'] = 'Employee Record Deleted!';
header("Location:". BASE_URL."employees_records.php");

?>