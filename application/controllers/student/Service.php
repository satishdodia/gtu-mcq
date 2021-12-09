<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
			//$this->load->model('Loginmodel');	
	}
	public function index()
	{
		$this->load->view('student/service');
	
	}
	
}
