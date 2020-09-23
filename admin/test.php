<?php

$monday = strtotime("last monday");

$monday = date('w', $monday) == date('w') ? $monday+7*86400 : $monday;

$sunday = strtotime(date("Y-m-d",$monday)." +6 days");

$start_date = date("Y-m-d",$monday);

$end_date = date("Y-m-d",$sunday);

echo ("Start Date: ". $start_date . "<br>");

echo ("End Date: " . $end_date . "<br>");
