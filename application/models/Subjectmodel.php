<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjectmodel extends CI_Model {

    public function getall() {
        $query = $this->db->get('subject');
        $result = $query->result_array();

        return $result;
    }

    function getall_join() {
        $this->db->select("s.*,st.name as branch,se.sem_name");
        $this->db->join('sem as se', 'se.id = s.sem_id', 'left');
        $this->db->join('std as st', 'st.id = s.std_id', 'left');
        $query = $this->db->get('subject as s');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return '';
    }

    public function getallstd() {
        $query = $this->db->get('std');
        $result = $query->result_array();

        return $result;
    }

    public function getallsem() {
        $query = $this->db->get('sem');
        $result = $query->result_array();

        return $result;
    }

    public function getallsubjectbystd($id, $sem) {
        $this->db->where('std_id', $id);
        $this->db->where('sem_id', $sem);
        $query = $this->db->get('subject');
        $result = $query->result_array();

        return $result;
    }

    public function add_sub($data) {
        $q = $this->db->insert('subject', $data);
        return $q;
    }

    public function deleteSubject($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('subject')) {
            return true;
        } else {
            return false;
        }
    }

}
