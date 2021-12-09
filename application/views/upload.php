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
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!--   <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <p class="notification">5</p>
                                <p>Notifications</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                    -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="col-md-12">
            <button type="button" class="btn btn-info add-new pull-right">Add New</button>
            <br/> <br/> 
        </div>
        <div class="container-fluid form-add hidden" style="background-color:#ffffff;padding:15px;">
            <form action="<?php echo base_url(); ?>Upload/uploadData" method="Post" accept-charset="utf-8"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="sel1">Select Branch:</label>
                    <select class="form-control" id="std" name="std" required>
                        <option value="0">Select Branch </option>
                        <?php foreach ($std as $skey): ?>
                            <option value="<?php echo $skey['id']; ?>"><?php echo $skey['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="sel1">Select Semester:</label>
                    <select class="form-control" id="sem" name="sem">
                        <option value="">Select Semester</option>                       
                        <?php foreach ($sem as $semkey): ?>
                            <option value="<?php echo $semkey['id']; ?>" required><?php echo $semkey['sem_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="sel1">Select Subject:</label>
                    <select class="form-control" id="sel1" name="sub_id" required>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="sel1">Select Lesson:</label>
                    <select class="form-control" id="sel1" name="less_id" required>
                        <?php foreach ($les as $key): ?>
                            <option value="<?php echo $key['lesson_id']; ?>"><?php echo $key['lesson_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="title"> Enter Quiz Title : </label>
                    <input type="text" name="title" placeholder="Enter Quiz Title" required  class="form-control">
                </div>
                <div class="form-group">
                    <label for="quiz_id"> Enter Quiz ID : </label>
                    <input type="text" name="quiz_id" placeholder="Enter Quiz ID" required class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="uploadFile"> Upload excel file : </label>
                    <input type="file" name="uploadFile" value="" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Upload"  class="btn btn-success">  
                </div>
            </form>
        </div>
        <br/>
        <div class='clearfix'></div>
        <div class="col-md-12" style="background-color:#ffffff;padding:15px;">
      
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Quiz Title</th>
                    <th>Quiz ID</th>
                    <th>Branch</th>
                    <th>Sem</th>
                    <th>Subject</th>
                    <th>Lesson</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($quiz_master as $key): ?>
                    <tr>
                        <td><?php echo $key['id']; ?></td>
                        <td><?php echo $key['title']; ?></td>
                        <td><?php echo $key['quiz_code']; ?></td>
                        <td><?php echo $key['branch']; ?></td>
                        <td><?php echo $key['sem_name']; ?></td>
                        <td><?php echo $key['sub_name']; ?></td>
                        <td><?php echo $key['lesson_name']; ?></td>
                        <td>
                            <a href="<?php echo base_url('upload/delete/' . $key['id']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        </div>
        <div class='clearfix'></div>
        <?php include_once("footer.php"); ?>
        <script type="text/javascript">
            $("#std").on('change', function () {
                var me = $(this).val();
                var sem = $('#sem').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('lesson/getmysubject'); ?>",
                    data: {'me': me, 'sem': sem},
                    success: function (msg) {

                        $('#sel1').html(msg);
                    }
                });
            });
            $("#sem").on('change', function () {
                var me = $("#std").val();
                var sem = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('lesson/getmysubject'); ?>",
                    data: {'me': me, 'sem': sem},
                    success: function (msg) {

                        $('#sel1').html(msg);
                    }
                });
            });
        </script>
