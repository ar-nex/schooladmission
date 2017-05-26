<?php

class Model_overview extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getOverview($offSet) {
        $sql = "SELECT b.id, b.name, b.dob, b.sex, b.img_name, t.typ, xi.stream, xi.form_id, xi.is_muted"
                . " FROM student_basic b"
                . " INNER JOIN xi_admission xi ON b.id = xi.student_basic_id INNER JOIN academic_info_x t ON t.student_basic_id = b.id"
                . " ORDER BY b.id DESC LIMIT 30 OFFSET " . $offSet;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
     public function getOverviewValid($offSet) {
        $sql = "SELECT b.id, b.name, b.dob, b.sex, b.img_name, t.typ, xi.stream, xi.form_id, xi.is_muted"
                . " FROM student_basic b"
                . " INNER JOIN xi_admission xi ON b.id = xi.student_basic_id INNER JOIN academic_info_x t ON t.student_basic_id = b.id"
                . " WHERE NOT xi.is_muted <=> 1"
                . " ORDER BY b.id DESC LIMIT 30 OFFSET " . $offSet;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
     public function getOverviewInValid() {
        $sql = "SELECT b.id, b.name, b.dob, b.sex, b.img_name, t.typ, xi.stream, xi.form_id, xi.is_muted"
                . " FROM student_basic b"
                . " INNER JOIN xi_admission xi ON b.id = xi.student_basic_id INNER JOIN academic_info_x t ON t.student_basic_id = b.id"
                . " WHERE xi.is_muted = 1"
                . " ORDER BY b.id DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
    
     public function getOverviewValidGender($offSet, $sx) {
        $sql = "SELECT b.id, b.name, b.dob, b.sex, b.img_name, t.typ, xi.stream, xi.form_id, xi.is_muted"
                . " FROM student_basic b"
                . " INNER JOIN xi_admission xi ON b.id = xi.student_basic_id INNER JOIN academic_info_x t ON t.student_basic_id = b.id"
                . " WHERE NOT xi.is_muted <=> 1 AND b.sex = '".$sx."'"
                . " ORDER BY b.id DESC LIMIT 30 OFFSET " . $offSet;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    public function getOverviewValidStream($offSet, $stream) {
        $sql = "SELECT b.id, b.name, b.dob, b.sex, b.img_name, t.typ, xi.stream, xi.form_id, xi.is_muted"
                . " FROM student_basic b"
                . " INNER JOIN xi_admission xi ON b.id = xi.student_basic_id INNER JOIN academic_info_x t ON t.student_basic_id = b.id"
                . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = '".$stream."'"
                . " ORDER BY b.id DESC LIMIT 30 OFFSET " . $offSet;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
     public function getOverviewValidType($offSet, $typ) {
        $sql = "SELECT b.id, b.name, b.dob, b.sex, b.img_name, t.typ, xi.stream, xi.form_id, xi.is_muted"
                . " FROM student_basic b"
                . " INNER JOIN xi_admission xi ON b.id = xi.student_basic_id INNER JOIN academic_info_x t ON t.student_basic_id = b.id"
                . " WHERE NOT xi.is_muted <=> 1 AND t.typ = '".$typ."'"
                . " ORDER BY b.id DESC LIMIT 30 OFFSET " . $offSet;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
    

    public function get_total_applied() {
        $sql = 'SELECT COUNT(*) AS count FROM xi_admission';
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->count;
    }
    
    public function get_valid_applied() {
        $sql = 'SELECT COUNT(*) AS count FROM xi_admission WHERE NOT is_muted <=>1';
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->count;
    }
    
    public function get_gender_count($sx) {
             $sql = "SELECT COUNT(*) AS count FROM student_basic b"
                     . " INNER JOIN xi_admission xi ON b.id=xi.student_basic_id"
                     . " WHERE b.sex = ? AND NOT xi.is_muted <=>1";  
             $binds = array($sx);
             $query = $this->db->query($sql, $binds);
             $row = $query->row();
             return $row->count;
    }
    
    public function get_stream_count($stream) {
             $sql = "SELECT COUNT(*) AS count FROM student_basic b"
                     . " INNER JOIN xi_admission xi ON b.id=xi.student_basic_id"
                     . " WHERE xi.stream = ? AND NOT xi.is_muted <=>1";  
             $binds = array($stream);
             $query = $this->db->query($sql, $binds);
             $row = $query->row();
             return $row->count;
    }
    
    public function get_type_count($type) {
             $sql = "SELECT COUNT(*) AS count FROM student_basic b"
                     . " INNER JOIN xi_admission xi ON b.id=xi.student_basic_id INNER JOIN academic_info_x a ON b.id=a.student_basic_id"
                     . " WHERE a.typ = ? AND NOT xi.is_muted <=>1";  
             $binds = array($type);
             $query = $this->db->query($sql, $binds);
             $row = $query->row();
             return $row->count;
    }

    public function getFormDetail($formid, $dob) {

        $sq1 = 'SELECT b.*, x.*, e.* FROM student_basic b 
                INNER JOIN academic_info_x x ON b.id = x.student_basic_id 
                INNER JOIN xi_admission e ON e.student_basic_id = b.id
		where e.form_id=?
		AND b.dob=?';
        $query = $this->db->query($sq1, array($formid, $dob));
        return $query->result_array();
    }

    public function doMute($fid, $rm) {
        $sql = 'UPDATE xi_admission
				SET is_muted = ?, mute_remark = ?
				WHERE form_id = ?';
        $query = $this->db->query($sql, array(1, $rm, $fid));
        return $query;
    }

}
