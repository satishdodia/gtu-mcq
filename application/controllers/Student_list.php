<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Subjectmodel');
        $this->load->model('Lessonmodel');
        $this->load->model('Students');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['std'] = $this->Subjectmodel->getallstd();
        $data['sem'] = $this->Subjectmodel->getallsem();
        $data['student'] = $this->Students->getall();
        $this->load->view('student', $data);
    }

    public function delete($id) {
        $result = $this->Students->delete_student($id);
        if ($result) {
            redirect('student_list');
        } else {
            echo "Something Wend Wrong! Please Try Again...";
        }
    }

    public function active($id) {
        $result = $this->Students->update_student($id, array('status' => 1));
        redirect('student_list');
    }

    public function deactive($id) {
        $result = $this->Students->update_student($id, array('status' => 0));
        redirect('student_list');
    }

}
