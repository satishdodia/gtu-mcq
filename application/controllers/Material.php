<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //  $this->load->database();
        $this->load->model('import_model', 'import');
        $this->load->model('Semestermodel');
        $this->load->model('standardmodel');
        $this->load->model('Subjectmodel');
        $this->load->model('Lessonmodel');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['std'] = $this->Subjectmodel->getallstd();
        $data['sem'] = $this->Subjectmodel->getallsem();
        $data['sub'] = $this->Subjectmodel->getall();
        $data['les'] = $this->Lessonmodel->getall();
        $data['materials'] = $this->import->getall_pdf_join();
        $this->load->view('material', $data);
    }

    public function uploadData() {

        if ($this->input->post('submit')) {

            $path = 'uploads/materials_pdfs/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if (empty($error)) {
                $quiz_data = array(
                    'branch_id' => $this->input->post('std'),
                    'sem_id' => $this->input->post('sem'),
                    'sub_id' => $this->input->post('sub_id'),
                    'lesson_id' => $this->input->post('less_id'),
                    'title' => $this->input->post('title'),
                    'materials_code' => $this->input->post('materials_id'),
                    'pdf_path' => $this->upload->file_name,
                );
                if ($this->import->add_data($quiz_data)) {
                    redirect('material');
                }
                echo 'Sorry! Something Went Wrong..!';
            } else {
                echo $error['error'];
            }
        }
    }

    public function delete($id) {
        $result = $this->import->delete_material($id);
        if ($result) {
            redirect('material');
        } else {
            echo "Something Wend Wrong! Please Try Again...";
        }
    }

}

?>
