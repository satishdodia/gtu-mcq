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
                <div class="col-md-offset-3 col-md-6" style="background-color: #fff;padding:15px;">
                   
                        <table class="table table-bordered " >
                            <tr>
                                <td> <b>Name : </b></td>
                                <td> <?php echo $_SESSION['quiz_user'][0]->name; ?></td>
                            </tr>
                            <tr>
                                <td> <b>Phone : </b></td>
                                <td> <?php echo $_SESSION['quiz_user'][0]->phone; ?></td>
                            </tr>
                            <tr>
                                <td> <b>Enrollment : </b></td>
                                <td> <?php echo $_SESSION['quiz_user'][0]->enroll; ?></td>
                            </tr>
                            <tr>
                                <td> <b>Branch / Field : </b></td>
                                <td> <?php echo $profile[0]['branch_name']; ?></td>
                            </tr>
                            <tr>
                                <td> <b>Semester : </b></td>
                                <td> <?php echo $profile[0]['sem_name']; ?></td>
                            </tr>
                        </table>
                </div>

            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initChartist();
            $.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>GTU MCQ Material</b>."
            }, {
                type: 'success',
                timer: 4000
            });
        });
    </script>
