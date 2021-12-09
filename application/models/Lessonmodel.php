<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lessonmodel extends CI_Model {

    public function index() {

        $data['sub'] = $this->Subjectmodel->getall();
        $data['les'] = $this->Lessonmodel->getall();

        $this->load->view('lesson', $data);
    }

    public function getall() {
        $this->db->select('*,lesson.id as lesson_id');
        $this->db->from('lesson');
        $this->db->join('subject', 'lesson.sub_id = subject.id');

        $query = $this->db->get();

        // $query = $this->db->get('lesson');
        $result = $query->result_array();

        return $result;
    }

    public function addless($data) {
        $q = $this->db->insert('lesson', $data);
        return $q;
    }

    public function deleteLess($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('lesson')) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllSubject($std, $sem) {
        $this->db->select('*');
        $this->db->from('subject');
        $this->db->where('std_id', $std);
        $this->db->where('sem_id', $sem);

        //$this->db->join('subject', 'lesson.sub_id = subject.id');

        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function getAllLessionVideo($lesId) {
        $this->db->select('video.id as video_id,video.video_link,video.title');
        $this->db->from('video');
        $this->db->where('video.less_id', $lesId);
        $querylesson = $this->db->get();
        $result = $querylesson->result_array();
        return $result;
    }

    public function getAllLession($subId) {
        $this->db->select('lesson.id as lesson_id,lesson.lesson_name');
        $this->db->from('lesson');
        $this->db->where('lesson.sub_id', $subId);
        $querylesson = $this->db->get();
        $result = $querylesson->result_array();
        return $result;
    }

}
