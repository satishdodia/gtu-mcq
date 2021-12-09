<?php

Class Profile extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_my_branch_data() {
        $this->db->select("se.sem_name,s.name as branch_name");
        $this->db->join('sem as se', 'se.id = ' . $_SESSION['quiz_user'][0]->sem);
        $this->db->where('s.id', $_SESSION['quiz_user'][0]->field);
        $query = $this->db->get('std as s');
        $result = $query->result_array();
        return $result;
    }

}

?>