<?php
    require_once "../models/Route.php";
    $response = [];
    try {
        $id=10;
        $routes = Route::testRoute($id);
        $response['success'] = true;
        $response['routes'] = $routes;
    } catch(Exception $ex) {
        $response['error']  = true;
        $response['msg'] = $ex->getMessage();
    }
    echo(json_encode($response));    
