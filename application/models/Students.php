<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Model {

    public function getall() {
        $this->db->select('s.*,b.name as branch,se.sem_name');
        $this->db->from('student as s');
        $this->db->join('std as b', 'b.id = s.field');
        $this->db->join('sem as se', 'se.id = s.sem');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function delete_student($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('student')) {
            return true;
        } else {
            return false;
        }
    }

     function update_student($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('student', $data);
        return $id;
    }
}
