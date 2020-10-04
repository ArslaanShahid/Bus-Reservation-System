<?php
require_once '../models/Admin.php';
if (isset($_SESSION['obj_admin'])) {
    $obj_admin = unserialize($_SESSION['obj_admin']);
} else {
    $obj_admin = new Admin();
}
define('BASE_FOLDER','/admin/');
define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].BASE_FOLDER);

$public_pages = [
    BASE_FOLDER."login.php",
];
$restricted_pages = [
    BASE_FOLDER."account.php",
    BASE_FOLDER."add_route",
    BASE_FOLDER."view_bus.php",
    BASE_FOLDER."view_routes.php",
    BASE_FOLDER."view_user_queries.php",
    BASE_FOLDER."bus.php",
    BASE_FOLDER."update_account.php",
    BASE_FOLDER."view_registered_user.php",
    BASE_FOLDER."addadmin.php",
    BASE_FOLDER."employee.php",
    BASE_FOLDER."employee_records.php",
    BASE_FOLDER."view_booking.php",

];
$current = $_SERVER['PHP_SELF'];

if(in_array($current,$restricted_pages) && !$obj_admin->loggedin) {
    $_SESSION['error'] = "Please Login To View This Page";
    header("Location:".BASE_URL."login.php");
    die;
}
if(in_array($current,$public_pages) && $obj_admin->loggedin) {
    $_SESSION['error'] = "Please Logout to View This Page";
    header("Location:".BASE_URL."index.php");
    die;
}
?>