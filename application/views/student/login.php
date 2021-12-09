<?php include_once 'header.php'; ?>


        <!-- breadcrump begin -->
        <div class="breadcrump-investo">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="breadcrump-content">
                            <h2>Login</h2>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Login</a>
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
                            <h2>Login To Enter</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5">
                        <div class="form-area">
                            <form method="post" action="<?php echo base_url('student/login/logck'); ?>">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" name="unm" placeholder="Enter Your Enrollment Number">
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <input class="mb-0" name="pass" type="password" placeholder="Enter Your Password">
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

   <?php include_once 'footer.php'; ?>