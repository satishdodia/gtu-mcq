<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
</head>
<body>
    <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>GTU MCQ Material</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Animation library for notifications   -->
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>
        <!--  Paper Dashboard core CSS    -->
        <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.css" rel="stylesheet"/>
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
        <!--  Fonts and icons     -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url(); ?>assets/css/themify-icons.css" rel="stylesheet">
    </head>
    <body>
        <?php $url = $_SERVER['REQUEST_URI']; ?>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            GTU MCQ Material
                        </a>
                    </div>
                    <ul class="nav">
                        <li  <?php
                        if (strpos($url, 'home') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('quiz/home'); ?>">
                                <i class="fa fa-home"></i>
                                <p>Profile  </p>
                            </a>
                        </li>
                        <li  <?php
                        if (strpos($url, 'exam') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('quiz/exam'); ?>">
                                <i class="fa fa-check-square-o"></i>
                                <p>Mcq Material</p>
                            </a>
                        </li>
                        <li  <?php
                        if (strpos($url, 'material') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('quiz/material'); ?>">
                                <i class="fa fa-book"></i>
                                <p>Materials</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://triumphtechsolution.com/contact.html">
                                <i class="fa fa-desktop"></i>
                                <p>Online training</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://triumphtechsolution.com">
                                <i class="fa fa-group "></i>
                                <p>Project training</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://triumphtechsolution.com/contact.html">
                                <i class="fa fa-comments"></i>
                                <p>Feedback</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('quiz/login/logout'); ?>"><i class="fa fa-sign-out"></i> <p>Logout</p></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="container">
                <?php
                if (!isset($_SESSION['quiz_user'])) {
                    redirect('student/login', 'refresh');
                }
                ?>
            </div>