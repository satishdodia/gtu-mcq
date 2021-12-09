<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Standard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Standardmodel');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['std'] = $this->Standardmodel->getall();
        $this->load->view('standard', $data);
    }

    public function add() {
        $data['name'] = $this->input->post('std');
        $result = $this->Standardmodel->add_data($data);
        redirect('standard');
    }

    public function deleteStandard($id) {

        $result = $this->Standardmodel->deletestd($id);

        if ($result) {
            redirect('standard');
        } else {
            echo "Something Wend Wrong! Please Try Again...";
        }
    }

    public function getlist() {
        $data['std'] = $this->Standardmodel->getall();
        echo json_encode($data);
        //$this->load->view('standard',$data);
    }

}
