<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videomodel extends CI_Model {

public function getall()
	{
        
		$this->db->select('*');
$this->db->from('video');
$this->db->join('lesson', 'video.less_id = lesson.id');

        $query = $this->db->get();
		$result = $query->result_array();
		
        return $result;
        	
        
	}
	public function addvideo($data)
	{
         $q = $this->db->insert('video',$data);
		return $q;
        
	}

public function deleteVideo($id)
	{
		$this->db->where('id',$id);
		if( $this->db->delete('video'))
		{
			return true;
			  
		}
		else
		{
			return false;
		}
	}
	  function field($id){
        $query = $this->db->get_where('std', array('subcategory_category_id' => $std));
        return $query;
    }
     
}