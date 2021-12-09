<?php

Class Loginmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($unm1, $pass1) {


        $this->db->select('*');
        $this->db->from('student');
        $this->db->group_start();
        $this->db->where('phone', $unm1);
        $this->db->or_where('enroll', $unm1);
        $this->db->group_end();
        $this->db->where('pass', $pass1);
        $this->db->where('status', 1);
        $this->db->limit(1);

        $query = $this->db->get();
        //  echo $this->db->last_query(); die;
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>