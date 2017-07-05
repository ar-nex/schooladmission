<?php

class Model_download extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getData() {
        $sql = "SELECT b.*, xi.*, a.* FROM student_basic b"
                . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                . " WHERE xi.admission_status = 'ADM'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
}
