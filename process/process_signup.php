<?php
require_once '../models/user.php';
require_once('../init.php');

use PHPMailer\PHPMailer\PHPMailer;

require "../vendor/autoload.php";
session_start();

$obj_user = new User();
$errors = [];

// // die($_POST['password']);
// die($_POST['last_name']);
// die($_POST['cnic']);


try {
    $obj_user->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}
try {
    $obj_user->email = $_POST['email'];
} catch (Exception $ex) {
    $errors['email'] = $ex->getMessage();
}
try {
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}
try {
    $obj_user->cnic = $_POST['cnic'];
} catch (Exception $ex) {
    $errors['cnic'] = $ex->getMessage();
}
if (count($errors) == 0) {
    try {
        $obj_user->signup();

        //Sending Mail on New Register

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->Port = 2525;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username   = '03205e84f3a9a5';
        $mail->Password   = 'c80952ed2e05f3';

        $mail->setFrom('smartbrs@techcodex.net', 'SmartBRS');
        $mail->addAddress($_POST['email'], 'Furqan');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booked Ticket No.';
        $mail->Body    = '<center><h1>Smart BRS </h1>'
            . '<h1>Hi,' . $_POST['user_name'] . '</h1>'
            . '<h2>You are now a member of Smart BRS</h2></center>'
            . '<h2>Thank you for choosing our Service.</h2>';

        $mail->send();


        $_SESSION['success'] = "Congratulations You Are Registered To Smart BRs, Now You can Login With your Credentials";
        header("Location:" . BASE_URL . "login.php");
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
        $_SESSION['msg'] = $msg;
        header("Location:" . BASE_URL . "register.php");
    }
} else {
    $msg = "Check Your Errors";
    $_SESSION['error'] = $msg;
    $_SESSION['errors'] = $errors;
    // $_SESSION['obj_user']= serialize($obj_user);
    header("Location:" . BASE_URL . "register.php");
}
