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
                    <?php
                    if (isset($exam_meta) && count($exam_meta) > 0) {
                        foreach ($exam_meta as $key => $value):
                            $key = $key + 1;
                            ?>
                             <div class="clearfix"></div>
                            <div class="col-md-12 question-box-<?php echo $key; ?>  <?php
                            if ($key != 1) {
                                echo 'hidden';
                            }
                            ?>" style="border:1px #bbb solid;padding:15px;">
                                <div class="col-md-12">
                                    <?php echo '<b>' . $key . ') ' . htmlspecialchars($value['question']) . '</b>'; ?>
                                </div>  
                                <div class="col-md-6" style="line-height: 2;">
                                    <?php echo '<b>A)</b> ' . htmlspecialchars($value['opt1']); ?>
                                </div>
                                <div class="col-md-6"  style="line-height: 2;">
                                    <?php echo '<b>B)</b> ' . htmlspecialchars($value['opt2']); ?>
                                </div>
                                <div class="col-md-6"  style="line-height: 2;">
                                    <?php echo '<b>C)</b> ' . htmlspecialchars($value['opt3']); ?>
                                </div>
                                <div class="col-md-6"  style="line-height: 2;">
                                    <?php echo '<b>D)</b> ' . htmlspecialchars($value['opt4']); ?>
                                </div>
                                <?php if ($value['desc'] != '') { ?>
                                    <div class="col-md-12">
                                        <?php echo '<b>Note :- ' . htmlspecialchars($value['desc']) . '</b>'; ?>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12">
                                    <span class='pull-right text-success'>
                                        <?php echo '<b>Correct answer:</b> ' . $value['ans']; ?>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <hr/>
                                    <?php if ($key != 1) { ?><button class='btn btn-info next-previos pull-left' data-npid='<?php echo $t = $key - 1; ?>' data-id='<?php echo $key; ?>' type="button">Previous</button><?php } ?>
                                    <?php if (count($exam_meta) != $key) { ?><button class='btn btn-info next-previos pull-right' data-npid='<?php echo $t = $key + 1; ?>' data-id='<?php echo $key; ?>' type="button">Next</button> <?php } ?>
                                </div>
                                     <div class="clearfix"></div>
                            </div>
                            <?php
                        endforeach;
                    }
                    ?>

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