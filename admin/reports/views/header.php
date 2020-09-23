<?php
require_once '../../init.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo(BASE_URL);?>assets/images/logo/favicon.png" type="image/x-icon">
    <link href="<?php echo (BASE_URL); ?>assets/front/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Smart BRS Report</title>
    <style>
        #logo{
            background-color: whitesmoke;
        }
        #logo img {
            margin-left: 45%;
        }
        .dates{
            font-size: 20px;
        }
        .table-responsive{
            margin-top:20px;
        }
        .heading{
            font-size: 20px;
        }
        
        @media print {
            .footer {
                position: fixed;
                bottom: 0;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid ">
    <header>
        <div id="logo">
            <img src="<?php echo(BASE_URL);?>assets/images/logo/smart_brs_report.png" width="150px" >
        </div>
    </header>
    <section class="">
        <div class="col-md-12 heading">
            <br>
            <center><span class=>Smart BRs</span></center>
        </div>
        <br>
        <div class="row dates">
            <div class="col-md-6">
                <span class="pull-left">Date:<u><?php echo(date("Y-m-d")); ?></u></span>
            </div>
            <div class="col-md-6" style="float:right;">
                <span class="float-right col-md-offset-5">Day:<u><?php echo(date("l"));?></u></span>
            </div>
        </div>
        <br class="clear-fix">
        <div class="row">
        <div class="col-md-12" style="width100% !important;">
