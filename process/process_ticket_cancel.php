
<?php
date_default_timezone_get("Asia/Karachi");
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    session_start();
    $cnic = $_GET['cnic'];
    if (!is_numeric( $cnic) || strlen($cnic)<13 || strlen($cnic)>13) {
        $_SESSION['error'] = 'Cnic not Valid, Please Enter 13 Digit Cnic';
        header('Location:../ticket_cancel.php');
    }
    else{
        header('Location:../ticket_cancel_info.php?cnic='.$cnic);
    }

}

?>