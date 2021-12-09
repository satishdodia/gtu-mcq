<?php

Class Loginmodel extends CI_Model {

 function __construct()
    {
          parent::__construct();
    }
    function login($unm1, $pass1) {
      

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $unm1);
        $this->db->where('password', $pass1);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
?>