<?php
    require_once "../models/Route.php";
$response = [];
// die($_GET['date']);
try {
    $routes = Route::dayRouteAPI($_GET['date']);
    $response['success'] = true;
    $response['routes'] = $routes;
} catch(Exception $ex) {
    $response['error']  = true;
    $response['msg'] = $ex->getMessage();
}
echo(json_encode($response));
