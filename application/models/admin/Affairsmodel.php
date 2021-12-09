<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affairsmodel extends CI_Model {

public function getall()
	{


		$this->db->select('*');
		$this->db->from('a_video');
		$this->db->join('cat', 'a_video.cat_id = cat.id');

        $query = $this->db->get();
		$result = $query->result_array();
		
        return $result;
        	
        
	}
	public function addvideo($data)
	{
         $q = $this->db->insert('a_video',$data);
		return $q;
        
	}
public function getid($id) {
  if($id != FALSE) {
  		$this->db->where('cat_id', $id);
		$this->db->select('*');
		$query = $this->db->get('a_video');
		

  // $query = $this->db->get();
    return $query->result_array();
  }
  else {
    return FALSE;
  }
}

public function deletevideo($id)
	{
		$this->db->where('id',$id);
		if( $this->db->delete('a_video'))
		{
			return true;
			  
		}
		else
		{
			return false;
		}
	}
}