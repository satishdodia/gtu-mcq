<?php include_once("header.php"); ?>
<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               
            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initChartist();
            $.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>GTU MCQ Materials Admin</b>."
            }, {
                type: 'success',
                timer: 4000
            });
        });
    </script>
