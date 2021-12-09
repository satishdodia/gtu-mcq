<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standardmodel extends CI_Model {

public function getall()
	{
        $query = $this->db->get('std');
		$result = $query->result_array();
		
        return $result;
        
	}
	public function add_data($data)
	{
         $q = $this->db->insert('std',$data);
		return $q;
        
	}

	public function deletestd($id)
	{
		$this->db->where('id',$id);
		if( $this->db->delete('std'))
		{
			return true;
			  
		}
		else
		{
			return false;
		}
	}
}