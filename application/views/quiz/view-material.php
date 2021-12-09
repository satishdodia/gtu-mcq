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
                <a class="navbar-brand" href="#"><?php echo $exam_meta[0]['title']; ?></a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="container-fluid" style="background-color:#ffffff;padding:15px;"> 
                   
                    <object style="width:100%;height:800px;" data="<?php echo base_url('uploads/materials_pdfs/').$exam_meta[0]['pdf_path']; ?>" type="application/pdf">
                        <embed src="<?php echo base_url('uploads/materials_pdfs/').$exam_meta[0]['pdf_path']; ?>#toolbar=0" type="application/pdf" />
                    </object> 
                </div>
            </div>
        </div>
    </div>

    <?php include_once("footer.php"); ?>
    <script>
        $('.next-previos').on('click', function () {
            var nnpid = $(this).attr('data-npid');
            var id = $(this).attr('data-id');

            $(".question-box-" + id).addClass('hidden');
            $(".question-box-" + nnpid).removeClass('hidden');
        });
    </script>