
<footer class="footer">
    <div class="container-fluid">
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.mementotech.in">Memento Team</a>
        </div>
    </div>
</footer>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script>
                $('.add-new').on('click', function () {
                    $('.form-add').removeClass('hidden');
                });
                function deleteStd(id)
                {
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this record!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Delete!",
                        closeOnConfirm: false
                    },
                            function (isConfirmed) {
                                if (isConfirmed) {
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url('standard/deleteStd'); ?>",
                                        data: {'pid': pid},
                                        success: function (msg) {
                                            $(".file").addClass("isDeleted");
                                            swal("Deleted!", "Your record has been deleted.", "success");
                                            $("#tr_" + id).fadeOut("slow");
                                        }
                                    });
                                }
                            }
                    );
                }
</script>
</html>