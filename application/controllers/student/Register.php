<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student/Usermodel', 'Usermodel');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['branch'] = $this->Usermodel->getall('std');
        $data['sem'] = $this->Usermodel->getall('sem');
        $this->load->view('student/register', $data);
    }

    public function add() {
        $data = array
            (
            "name" => $this->input->post('name'),
            "phone" => $this->input->post('phone'),
            "enroll" => $this->input->post('enroll'),
            "field" => $this->input->post('field'),
            "sem" => $this->input->post('sem'),
            "pass" => $this->input->post('pass'),
            "status" => 0
        );

        $result = $this->Usermodel->adduser($data);
        redirect('student/login');
    }

}
