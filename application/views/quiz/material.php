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
                <a class="navbar-brand" href="#">Materials</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               <?php /* <div class="col-md-12">
                    <button type="button" class="btn btn-info add-new pull-right">Filter</button>
                    <br/> <br/> 
                </div>
                <div class="container-fluid form-add hidden" style="background-color:#ffffff;padding:15px;"> 
                    <form class="form-filter" method="Post" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="sel1">Select Subject:</label>
                            <select class="form-control" id="sel1" name="sub_id">
                                <option value="">Select Subject</option>
                                <?php
                                if (isset($subject) && count($subject) > 0) {
                                    foreach ($subject as $key => $value):
                                        echo '<option value="' . $value['id'] . '">' . $value['sub_name'] . '</option>';
                                    endforeach;
                                } 
                                ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="sel1">Select Lesson:</label>
                            <select class="form-control" id="lesson" name="lesson">
                                <option value="">Select Lesson</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <input type="button" name="" value="Filter" class="btn btn-success filter">     
                        </div>
                    </form>

                </div><br/> */ ?>
                <div class="container-fluid" style="background-color:#ffffff;padding:15px;"> 
                    <div class="result">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("footer.php"); ?>
    <script>
        $(document).ready(function () {
            load_exam();
        });
        $('.filter').on('click', function () {
            load_exam();
        });
        function load_exam() {
            var sub_id = $("#sel1").val();
            var lesson_id = $("#lesson").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('quiz/material/get_exam'); ?>",
                data: {sub_id: sub_id, lesson_id: lesson_id},
                success: function (data) {
                    $(".result").empty();
                    $(".result").append(data);
                }
            });
        }
    </script>