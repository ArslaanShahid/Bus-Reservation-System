<?php
session_start();
require_once '../../models/Queries.php';
require_once '../init.php';
Queries::deleteQuery($_GET['id']);
$_SESSION['success'] = 'User Complaint Deleted!';
header("Location:". BASE_URL."view_user_queries.php");

?>