<?php
session_start();
require_once '../../models/Route.php';
require_once '../init.php';

Route::deleteRoute($_GET['id']);
$_SESSION['success'] = 'Route Deleted!';
header("Location:". BASE_URL."view_routes.php");

?>