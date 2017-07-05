<?php

class Model_admin extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAdmin_namepass($username) {
        $sql = 'select id, name, password from admin where username = ?';
        $query = $this->db->query($sql, array($username));
        if ($query->num_rows() == 1) {
            $return_user = $query->row();
            return $return_user;
        } else {
            return FALSE;
        }
    }

    public function get_date() {
        $sql = "select * from apply_date ORDER BY id DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            $result = $result[0];
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

    public function get_total_invalid() {
        $sql = "SELECT COUNT(*) AS count FROM xi_admission where is_muted = 1";
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
    
    
    public function get_percentage_required() {
        $sql = "select * from percentage_required ORDER BY id DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            $result = $result[0];
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
    
    
    

}
