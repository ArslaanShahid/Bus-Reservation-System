<?php
session_start();
require_once '../../models/Queries.php';

Queries::deleteQuery($_GET['id']);
$_SESSION['success'] = 'User Complaint Deleted!';
header("Location:../view_user_queries.php");

?>