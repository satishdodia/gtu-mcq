<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjectmodel extends CI_Model {

public function getall()
	{
        $query = $this->db->get('subject');
		$result = $query->result_array();
		
        return $result;
        
	}
	public function getallstd()
	{
        $query = $this->db->get('std');
		$result = $query->result_array();
		
        return $result;
        
	}
	
	public function getallsem()
	{
        $query = $this->db->get('sem');
		$result = $query->result_array();
		
        return $result;
        
	}
	
		public function getallsubjectbystd($id,$sem)
	{
	    $this->db->where('std_id',$id);
	    $this->db->where('sem_id',$sem);
        $query = $this->db->get('subject');
		$result = $query->result_array();
		
        return $result;
        
	}
	
	public function add_sub($data)
	{
         $q = $this->db->insert('subject',$data);
		return $q;
        
	}

	public function deleteSubject($id)
	{
		$this->db->where('id',$id);
		if( $this->db->delete('subject'))
		{
			return true;
			  
		}
		else
		{
			return false;
		}
	}
}