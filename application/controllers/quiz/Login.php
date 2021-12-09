<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function logout() {
        $this->session->unset_userdata('quiz_user');
        session_destroy();
        redirect('student/login', 'refresh');
    }

}
