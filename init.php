<?php
require_once 'models/user.php';
if (isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $obj_user = new User();
}
define('BASE_FOLDER','/');
define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].BASE_FOLDER);

$public_pages = [
    BASE_FOLDER."login.php",
    BASE_FOLDER."register.php",
];

$restricted_pages = [
    BASE_FOLDER."account.php",
    BASE_FOLDER."my_account.php",
    BASE_FOLDER."view_ticket.php",
    BASE_FOLDER."update_account.php",
];
$current = $_SERVER['PHP_SELF'];

if(in_array($current,$restricted_pages) && !$obj_user->loggedin) {
    $_SESSION['error'] = "Please Login To View This Page";
    header("Location:".BASE_URL."login.php");
    die;
}

if(in_array($current,$public_pages) && $obj_user->loggedin) {
    $_SESSION['error'] = "Please Logout to View This Page";
    header("Location:".BASE_URL."index.php");
    die;
}
?>