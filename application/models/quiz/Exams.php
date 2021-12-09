<?php

Class Exams extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_my_subject() {
        $this->db->where('std_id', $_SESSION['quiz_user'][0]->field);
        $this->db->where('sem_id', $_SESSION['quiz_user'][0]->sem);
        $query = $this->db->get('subject');
        $result = $query->result_array();
        return $result;
    }

    public function get_exam($subject, $lesson) {

        $this->db->select("q.*,s.sub_name");

        $this->db->join('subject as s', 's.id = q.sub_id');
        if ($subject != 0) {
            $this->db->where('q.sub_id', $subject);
        }
        if ($lesson != 0) {
            $this->db->where('q.lesson_id', $lesson);
        }
        $this->db->where('q.branch_id', $_SESSION['quiz_user'][0]->field);
        $this->db->where('q.sem_id', $_SESSION['quiz_user'][0]->sem);
        $query = $this->db->get('quiz_master as q');
        $result = $query->result_array();
        return $result;
    }

    public function getall($table, $where = '') {
        if ($where != '') {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        $result = $query->result_array();

        return $result;
    }

    public function get_exam_data($id) {
        $this->db->select("q.*,qm.*,s.sub_name,l.lesson_name");
        $this->db->join('quiz as qm', 'q.id = qm.quiz_id');
        $this->db->join('subject as s', 's.id = q.sub_id');
        $this->db->join('lesson as l', 'l.id = q.lesson_id');
        $this->db->where('q.id', $id);
        $query = $this->db->get('quiz_master as q');
        $result = $query->result_array();
        return $result;
    }

    public function get_material($subject, $lesson) {

        $this->db->select("q.*,s.sub_name");

        $this->db->join('subject as s', 's.id = q.sub_id');
        if ($subject != 0) {
            $this->db->where('q.sub_id', $subject);
        }
        if ($lesson != 0) {
            $this->db->where('q.lesson_id', $lesson);
        }
        $this->db->where('q.branch_id', $_SESSION['quiz_user'][0]->field);
        $this->db->where('q.sem_id', $_SESSION['quiz_user'][0]->sem);
        $query = $this->db->get('materials as q');
        $result = $query->result_array();
        return $result;
    }

}

?>