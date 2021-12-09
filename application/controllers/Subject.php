<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Semestermodel');
        $this->load->model('standardmodel');
        $this->load->model('Subjectmodel');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['sem'] = $this->Semestermodel->getall();
        $data['std'] = $this->standardmodel->getall();
        $data['sub'] = $this->Subjectmodel->getall_join();
        $this->load->view('subject', $data);
    }

    public function add_sub() {
        $data = array
            (
            "sem_id" => $this->input->post('sem_id'),
            "std_id" => $this->input->post('std_id'),
            "sub_name" => $this->input->post('sub_name')
        );

        $result = $this->Subjectmodel->add_sub($data);
        redirect('subject');
    }

    public function deleteSub($id) {

        $result = $this->Subjectmodel->deleteSubject($id);

        redirect('subject');
    }

    public function getlist() {
        $data['std'] = $this->Subjectmodel->getall();
        echo json_encode($data);
        //$this->load->view('standard',$data);
    }

}
