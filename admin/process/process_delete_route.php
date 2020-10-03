<?php
session_start();
require_once '../../models/Route.php';

Route::deleteRoute($_GET['id']);
$_SESSION['success'] = 'Route Deleted!';
header("Location:../view_routes.php");

?>