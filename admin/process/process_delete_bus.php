<?php
session_start();
require_once '../../models/Bus.php';
require_once '../init.php';

Bus::DeleteBus($_GET['id']);
$_SESSION['success'] = 'Bus Deleted!';
header("Location:". BASE_URL."view_Bus.php");

?>