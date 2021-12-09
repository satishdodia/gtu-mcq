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
            <button type="button" class="btn btn-info add-new pull-right">Add New</button>
            <br/> <br/> 
        </div>
        <div class="container-fluid form-add hidden" style="background-color:#ffffff;padding:15px;">
            <form action="<?php echo base_url("Subject/add_sub"); ?>" method="Post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="sel1">Select Branch:</label>
                    <select class="form-control" id="sel1" name="std_id">
                        <option value="">Select Branch</option>
                        <?php foreach ($std as $key): ?>
                            <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="sel1">Select Semester:</label>
                    <select class="form-control" id="sel1" name="sem_id">
                        <option value="">Select Semester</option>                       
                        <?php foreach ($sem as $key): ?>
                            <option value="<?php echo $key['id']; ?>"><?php echo $key['sem_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <input type="text" name="sub_name" placeholder="Enter Subject"  class="form-control"><br>
                <input type="submit" name="" value="submit" class="btn btn-success">              
            </form>
        </div>
        <br>
        <div class="col-md-12" style="background-color:#ffffff;padding:15px;">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>Semester</th>
                    <th>Branch</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($sub as $key): ?>
                    <tr>
                        <td><?php echo $key['id']; ?></td>
                        <td><?php echo $key['sub_name']; ?></td>
                        <td><?php echo $key['sem_name']; ?></td>
                        <td><?php echo $key['branch']; ?></td>
                        <td>
                            <a href="<?php echo base_url('Subject/deleteSub/' . $key['id']); ?> ">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table> 
        </div>
    </div>
</div>
</div>

<?php include_once("footer.php"); ?>