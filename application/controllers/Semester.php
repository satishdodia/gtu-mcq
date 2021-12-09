<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->model('Semestermodel');	
		$this->load->model('standardmodel');	
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['sem'] = $this->Semestermodel->getall();
		$data['std'] = $this->standardmodel->getall();
		$this->load->view('semester',$data);
	
	}
	public function add_sem()
	{
		$data = array
		(
			"sem_name"=>$this->input->post('sem_name'),
			//"std_id"=>$this->input->post('std_id')
			

		);

		$result = $this->Semestermodel->add_data($data);
			redirect('semester');	
		}

	public function deleteSemester($id)
	{
		
   		 $result = $this->Semestermodel->deletesem($id); 
   		 
		redirect('semester');
		
	}
public function getlist()
	{
		$data['std'] = $this->Semestermodel->getall();
		echo json_encode($data);  
		//$this->load->view('standard',$data);
	
	}
	
}