<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model {

    public function addquiz($data) {
        $q = $this->db->insert('quiz_master', $data);
        return $this->db->insert_id();
    }

    public function add_data($data) {
        $q = $this->db->insert('materials', $data);
        return $this->db->insert_id();
    }

    public function importData($data) {

        $res = $this->db->insert_batch('quiz', $data);
        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getall_join() {
        $this->db->select("q.*,l.lesson_name,se.sem_name,st.name as branch,sub.sub_name");
        $this->db->join('sem as se', 'se.id = q.sem_id', 'left');
        $this->db->join('std as st', 'st.id = q.branch_id', 'left');
        $this->db->join('subject as sub', 'sub.id = q.sub_id', 'left');
        $this->db->join('lesson as l', 'l.id = q.lesson_id', 'left');
        $query = $this->db->get('quiz_master as q');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return '';
    }

    public function delete_quiz($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('quiz_master')) {
            $this->db->where('quiz_id', $id);
            if ($this->db->delete('quiz')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete_material($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('materials')) {
            return true;
        } else {
            return false;
        }
    }

    function getall_pdf_join() {
        $this->db->select("q.*,l.lesson_name,se.sem_name,st.name as branch,sub.sub_name");
        $this->db->join('sem as se', 'se.id = q.sem_id', 'left');
        $this->db->join('std as st', 'st.id = q.branch_id', 'left');
        $this->db->join('subject as sub', 'sub.id = q.sub_id', 'left');
        $this->db->join('lesson as l', 'l.id = q.lesson_id', 'left');
        $query = $this->db->get('materials as q');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return '';
    }

}

?>
