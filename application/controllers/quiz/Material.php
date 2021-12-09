<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('quiz/Exams', 'Exams');
    }

    public function index() {
        //$_SESSION['quiz_user'][0]->sem
        $data['subject'] = $this->Exams->get_my_subject();

        $this->load->view('quiz/material', $data);
    }

    function get_exam() {
        $subject = (!empty($this->input->post('sub_id')) ? $this->input->post('sub_id') : 0);
        $lesson = (!empty($this->input->post('lesson')) ? $this->input->post('lesson') : 0);

        $exam = $this->Exams->get_material($subject, $lesson);
      
        //echo $this->db->last_query();
        if (!empty($exam) && count($exam) > 0) {
            foreach ($exam as $key => $value):
                ?>

                <div class="col-lg-3 col-sm-6">
                    <div class="card" style="background-color: #e9e9e9;">
                        <div class="content">
                            <div class="row">

                                <div class="col-xs-12">
                                    <h3> <?php echo $value['materials_code'] . ' - ' . $value['title']; ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <hr style="border-color:#ffffff;">
                                <div class="col-md-12">
                                    <?php echo $value['sub_name']; ?> 
                                    <span class="pull-right"><a href="<?php echo base_url('quiz/material/view/' . $value['id']); ?>"  class="btn btn-success">View</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            endforeach;
        }
    }

    function view($id) {
        $data['exam_meta'] = $this->Exams->getall('materials',array('id' => $id));
        $this->load->view('quiz/view-material', $data);
    }

}
