<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lesson extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		/*$this->load->model('Semestermodel');	
		$this->load->model('standardmodel');*/
		$this->load->model('Subjectmodel');	
		$this->load->model('Lessonmodel');	
		$this->load->helper('url_helper');
	}
	public function index()
	{
		/*$data['sem'] = $this->Semestermodel->getall();
		$data['std'] = $this->standardmodel->getall();*/
		$data['std'] = $this->Subjectmodel->getallstd();
		$data['sub'] = $this->Subjectmodel->getall();
		$data['les'] = $this->Lessonmodel->getall();
		$data['sem'] = $this->Subjectmodel->getallsem();
		$this->load->view('lesson',$data);
	
	}
	
	public function getmysubject()
	{
	    $id = $this->input->post('me');
	    $sem = $this->input->post('sem');
	    
	    $subject =  $this->Subjectmodel->getallsubjectbystd($id,$sem);
	    
	    //print_r($subject); exit;
	    if(!empty($subject) && count($subject) > 0)
	     {
	         foreach($subject as $sub):
	             ?>
	             <option value="<?php echo $sub['id']; ?>" ><?php echo $sub['sub_name']; ?></option>
	             <?php 
	             endforeach; 
	     }
	    
	    
	}
	
	public function add_lesson()
	{
		$data = array
		(
			"sub_id"=>$this->input->post('sub_id'),			
			"lesson_name"=>$this->input->post('lesson_name')	

		);

		$result = $this->Lessonmodel->addless($data);
			redirect('lesson');	
		}

	public function deleteless($id)
	{
		
   		 $result = $this->Lessonmodel->deleteLess($id); 
		
		redirect('lesson');
	}

	public function getlist()
	{
		$data['std'] = $this->Lessonmodel->getall();
		echo json_encode($data);  
		//$this->load->view('standard',$data);
	
	}
	public function find_video($id)
	{
		
		$data['Current Affairs'] = $this->Affairsmodel->getid($id);
		echo json_encode($data);  
		//$this->load->view('standard',$data);
	
	}

	public function getsubject($std,$sem)
	{
		$data['std'] = $this->Lessonmodel->getAllSubject($std,$sem);
		echo json_encode($data);  
	}

	public function getLessionVideo($subId)
	{
		$lessonvideo = $this->Lessonmodel->getAllLession($subId);
		$data['lesson'][] = "";
	
		if(count($lessonvideo) > 0) {
		foreach($lessonvideo as $key=>$value)
		{
		  
		  $video = $this->Lessonmodel->getAllLessionVideo($value['lesson_id']);
		    	
		    	if(count($video) > 0) {
		    	    $vid = array();
    		    	foreach($video as $v) {
    		    	  array_push($vid,$v);
    		    	   $lessonvideo[$key]['video'] = $vid;
    		    	   
    		    	}
    		    	
		    	}  
		}
		}
		
		echo json_encode($lessonvideo);  
	}
}