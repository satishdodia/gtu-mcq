<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="h<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <meta charset="utf-8">
        <title>Welcome to GTU MCQ Materials</title>
    </head>
    <body>

        <div id="container">


            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->

                    <!-- Icon -->
                    <div class="fadeIn first">
                        <h3>Welcome to <br/>GTU MCQ Materials Admin</h3>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="<?php echo base_url("login/logck"); ?>">
                        <input type="text" placeholder="Enter Username" name="unm" required id="login" class="fadeIn second" >
                        <input type="password" id="password" class="fadeIn third"  placeholder="Enter Password" name="pass" required>
                        <input type="submit" class="fadeIn fourth" value="Log In">
                    </form>

                    <!-- Remind Passowrd -->
                    <div id="formFooter">
                        <a class="underlineHover" href="https://www.mementotech.in/" target="_blank">Manage By Memento Tech</a>
                    </div>

                </div>
            </div>

        </div>
    </body>
</html>