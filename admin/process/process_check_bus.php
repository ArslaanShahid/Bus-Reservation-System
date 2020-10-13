<?php
require_once '../../models/Route.php';

$result = Route::checkRouteBus($_GET['id']);

echo(json_encode($result));