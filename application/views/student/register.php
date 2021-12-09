<?php include_once 'header.php'; ?>
<!-- breadcrump begin -->
<div class="breadcrump-investo">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="breadcrump-content">
                    <h2>Register</h2>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrump end -->

<!-- contact begin -->
<div class="investo-forms" id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="section-title">
                    <h2>Register To Enter</h2>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5">
                <div class="form-area">
                    <form action="<?php echo  base_url("student/register/add"); ?>" method="post">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <input type="text" name="name" required placeholder="Enter Your Full Name">
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <input type="phone" name="phone" required placeholder="Enter Your Mobile Number">
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <input type="text" name="enroll" required placeholder="Enrollment Number">
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <select name="field" required  class="form-control">
                                    <option value=""> Select Field / Branch </option>
                                    <?php
                                    if (isset($branch) && count($branch) > 0) {
                                        foreach ($branch as $key => $value):
                                            echo '<option value="' . $value['id']. '">' . $value['name'] . '</option>';
                                        endforeach;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12">    <br/>
                                <select name="sem"  class="form-control">
                                    <option value="">Select Semester</option>
                                    <?php
                                    if (isset($sem) && count($sem) > 0) {
                                        foreach ($sem as $skey => $svalue):
                                            echo '<option value="' . $svalue['id'] . '">' . $svalue['sem_name'] . '</option>';
                                        endforeach;
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-xl-12 col-lg-12">    <br/>
                                <input class="mb-0" name="pass" type="password" placeholder="Enter Your Password " >
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <button type="submit">Login Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact end -->

<!-- footer begin -->
<?php include_once 'footer.php'; ?>