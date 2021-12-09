<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semestermodel extends CI_Model {

public function getall()
	{
        $query = $this->db->get('sem');
		$result = $query->result_array();
		
        return $result;
        
	}
	public function add_data($data)
	{
         $q = $this->db->insert('sem',$data);
		return $q;
        
	}

	public function deletesem($id)
	{
		$this->db->where('id',$id);
		if( $this->db->delete('sem'))
		{
			return true;
			  
		}
		else
		{
			return false;
		}
	}
}