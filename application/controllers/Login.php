<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Loginmodel');
    }

    public function index() {
        $this->load->view('login');
    }

    public function logck() {
        $unm1 = $this->input->post('unm');
        $pass1 = $this->input->post('pass');


        $result = $this->Loginmodel->login($unm1, $pass1);
        if ($result != "") {

            $this->session->set_userdata('userdata', $result);
            redirect('home');
        } else
            redirect('login');
    }

    public function logout() {
        $this->session->unset_userdata('userdata');
        session_destroy();
        redirect('login', 'refresh');
    }

}
