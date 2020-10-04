<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $date = $_POST['departure_time'];

    // echo('<pre>');
    // echo  date('h:i a' , strtotime($_POST['departure_time']));
    // echo('</pre>');
    // die;
    session_start();
    require_once '../../models/Route.php';
    require_once '../init.php';
    $obj_route = new Route();
    $errors = [];

    try {
        $obj_route->bus_id = $_POST['bus_id'];
    } catch (Exception $ex) {
        $errors['bus_id'] = $ex->getMessage();
    }

    try {
        $obj_route->departure = $_POST['departure'];
    } catch (Exception $ex) {
        $errors['departure'] = $ex->getMessage();
    }

    try {
        $obj_route->arrival = $_POST['arrival'];
    } catch (Exception $ex) {
        $errors['arrival'] = $ex->getMessage();
    }

    try {
        $obj_route->fare = $_POST['fare'];
    } catch (Exception $ex) {
        $errors['fare'] = $ex->getMessage();
    }

    try {
        $obj_route->duration = $_POST['duration'];
    } catch (Exception $ex) {
        $errors['duration'] = $ex->getMessage();
    }

    try {
        $obj_route->departure_time = $_POST['departure_time'];
    } catch (Exception $ex) {
        $errors['departure_time'] = $ex->getMessage();
    }

    try {
        $obj_route->distance = $_POST['distance'];
    } catch (Exception $ex) {
        $errors['distance'] = $ex->getMessage();
    }

    try {
        $obj_route->days = isset($_POST['days']) ? $_POST['days'] : '';
    } catch (Exception $ex) {
        $errors['days'] = $ex->getMessage();
    }


    if (count($errors) == 0) {
        try {
            $obj_route->addRoute();
            $_SESSION['success'] = "Routes Added Successfully";
            header("Location:". BASE_URL."add_route.php");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            $_SESSION['error'] = $msg;
            header("Location:". BASE_URL."add_route.php");
        }
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;

        header("Location:". BASE_URL."add_route.php");
    }
}
