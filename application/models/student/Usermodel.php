<?php

Class Usermodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function adduser($data) {
        $q = $this->db->insert('student', $data);
        return $q;
    }

    public function getall($table) {
        $query = $this->db->get($table);
        $result = $query->result_array();

        return $result;
    }

}

?>