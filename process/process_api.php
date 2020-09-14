<?php
    require_once "../models/Route.php";
    $response = [];
    try {
        $routes = Route::testRoute();
        $response['success'] = true;
        $response['routes'] = $routes;
    } catch(Exception $ex) {
        $response['error']  = true;
        $response['msg'] = $ex->getMessage();
    }
    echo(json_encode($response));    
