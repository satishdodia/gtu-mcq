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
        <title>GTU MCQ Materials Admin</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>
        <!--  Paper Dashboard core CSS    -->
        <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />

        <!--  Fonts and icons     -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/themify-icons.css" rel="stylesheet">
    </head>
    <body>
        <?php $url = $_SERVER['REQUEST_URI']; ?>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                          GTU MCQ Materials Admin
                        </a>
                    </div>
                    <ul class="nav">
                        <li  <?php
                        if (strpos($url, 'home') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('home'); ?>">
                                <i class="fa fa-home"></i>
                                <p>Dashboard    </p>
                            </a>
                        </li>
                        <li <?php
                        if (strpos($url, 'standard') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('standard'); ?>">
                                <i class="fa fa-circle-o"></i>
                                <p>Add Field Or Branch</p>
                            </a>
                        </li>
                        <li  <?php
                        if (strpos($url, 'semester') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('semester'); ?>">
                                <i class="fa fa-file-image-o"></i>
                                <p>Add Semester</p>
                            </a>
                        </li>
                        <li  <?php
                        if (strpos($url, 'subject') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('subject'); ?>">
                                <i class="fa fa-file-o"></i>
                                <p>Add Subject</p>
                            </a>
                        </li>
                        <li  <?php
                        if (strpos($url, 'lesson') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('lesson'); ?>">
                                <i class="fa fa-book"></i>
                                <p>Add Lesson</p>
                            </a>
                        </li>
                        <li  <?php
                        if (strpos($url, 'upload') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('upload'); ?>">
                                <i class="fa fa-cloud-upload"></i>
                                <p>Upload Quiz</p>
                            </a>
                        </li>
                          <li  <?php
                        if (strpos($url, 'material') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('material'); ?>">
                                <i class="fa fa-book"></i>
                                <p>Upload Material</p>
                            </a>
                        </li>
                         <li  <?php
                        if (strpos($url, 'student_list') !== false) {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url('student_list'); ?>">
                                <i class="fa fa-group"></i>
                                <p>Students </p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> <p>Logout</p></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="container">
<?php
if (!isset($_SESSION['userdata'])) {
    redirect('login', 'refresh');
}
?>
            </div>