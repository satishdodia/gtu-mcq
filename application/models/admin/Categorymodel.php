<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorymodel extends CI_Model {

public function getall()
	{
        $query = $this->db->get('cat');
		$result = $query->result_array();
		
        return $result;
        
	}
	public function add_data($data)
	{
         $q = $this->db->insert('cat',$data);
		return $q;
        
	}

	public function deletecat($id)
	{
		$this->db->where('id',$id);
		if( $this->db->delete('cat'))
		{
			return true;
			  
		}
		else
		{
			return false;
		}
	}
}