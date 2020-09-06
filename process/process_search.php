<?php
date_default_timezone_get("Asia/Karachi");
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    session_start();
    $from = $_GET['departure'];
    $to = $_GET['arrival'];
    $date = $_GET['date'];

    $current = strtotime(date("Y-m-d"));
    $user_date = strtotime($date);

    if($current > $user_date)
    {
        $_SESSION['error'] = 'Time is not Valid';
        header('Location:../index.php');
    }else{
        header('Location:../search.php?from='.$from.'&to='.$to.'&date='.$date);
    }

}

?>