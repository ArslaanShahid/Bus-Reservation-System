<?php
require_once('../init.php');
date_default_timezone_get("Asia/Karachi");
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    session_start();
    if ($from = $_GET['departure'] ==  $to = $_GET['arrival']){
        $_SESSION['error'] = 'Departure and Arrival Cities Cant be Same';
        header("Location:". BASE_URL."index.php");
        die;
    }
    $from = $_GET['departure'];
    $to = $_GET['arrival'];
    $date = $_GET['date'];

    $current = strtotime(date("Y-m-d"));
    $user_date = strtotime($date);

    if($current > $user_date)
    {
        $_SESSION['error'] = 'Date not Valid';
        header("Location:". BASE_URL."index.php");
    }else{
        header("Location:". BASE_URL."search.php?from=".$from.'&to='.$to.'&date='.$date);
    }

}

?>