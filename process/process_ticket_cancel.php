
<?php
date_default_timezone_get("Asia/Karachi");
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    session_start();
  
    $cnic = $_GET['cnic'];
    
    if($cnic == "")
    {
        $_SESSION['error'] = 'Cnic not Valid';
        header('Location:../ticket_cancel.php');
    }else{
        header('Location:../ticket_cancel_info.php?cnic='.$cnic);
    }

}

?>