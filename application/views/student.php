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
                    <!--
                      <li class="dropdown">
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
            <button type="button" class="btn btn-info add-new pull-right">Filter</button>
            <br/> <br/> 
        </div>
        <div class="container-fluid form-add hidden" style="background-color:#ffffff;padding:15px;"> 
            <form action="javascript:void(0);" method="Post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="sel1">Select Semester:</label>
                    <select class="form-control" id="sem" name="sem">
                        <option value="">Select Semester</option>
                        <?php foreach ($sem as $semkey): ?>
                            <option value="<?php echo $semkey['id']; ?>"><?php echo $semkey['sem_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="sel1">Select Branch:</label>
                    <select class="form-control" id="std" name="std">
                        <option value="0">Select Branch </option>
                        <?php foreach ($std as $skey): ?>
                            <option value="<?php echo $skey['id']; ?>"><?php echo $skey['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-group">
                    <input type="submit" name="" value="submit" class="btn btn-success">     
                </div>
            </form>

        </div> <br/>
        <div class="col-md-12" style="background-color:#ffffff;padding:15px;">
            <table class="table">
                <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Enrollment</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($student as $key => $value): ?>
                    <tr>
                        <td><?php echo $t = $key + 1; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['phone']; ?></td>
                        <td><?php echo $value['enroll']; ?></td>
                        <td><?php echo $value['branch']; ?></td>
                        <td><?php echo $value['sem_name']; ?></td>
                        <td><?php echo $value['pass']; ?></td>
                        <td>
                            <?php if($value['status'] == 0) { ?>
                            <a href="<?php echo base_url('student_list/active/' . $value['id']); ?>" class="text-success"><b>Active</b></a>
                            <?php } else {  ?>
                            <a href="<?php echo base_url('student_list/deactive/' . $value['id']); ?>" class="text-danger"><b>Deactive</b></a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('student_list/delete/' . $value['id']); ?> ">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table> 
        </div>
    </div>
</div>

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
</script>
