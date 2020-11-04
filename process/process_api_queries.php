<?php
require_once '../models/Queries.php';
$response = [];

try {
    Queries::api_user_query($_GET['name'], $_GET['email'], $_GET['mobile'], $_GET['msg']);
    $response['success'] = true;
} catch(Exception $ex) {
    $response['error']  = true;
    $response['msg'] = $ex->getMessage();
}
echo(json_encode($response));
