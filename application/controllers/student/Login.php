<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student/Loginmodel', 'Loginmodel');
    }

    public function index() {
        $this->load->view('student/login');
    }

    public function logck() {
        $unm1 = $this->input->post('unm');
        $pass1 = $this->input->post('pass');
        $result = $this->Loginmodel->login($unm1, $pass1);
        if ($result != "") {
            $this->session->set_userdata('quiz_user', $result);
            redirect('quiz/home');
        } else
            redirect('student/login');
    }

}
