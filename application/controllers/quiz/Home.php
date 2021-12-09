<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('quiz/Profile', 'Profile');
    }

    public function index() {
        $data['profile'] = $this->Profile->get_my_branch_data();
        $this->load->view('quiz/home',$data);
    }

}
